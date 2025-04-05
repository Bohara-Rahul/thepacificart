<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as CartModel;
use App\Models\Product;

class Cart extends Component
{
    // public $productId;
    public $cartItems = [];

    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount()
    {
        // $this->productId = $productId;
        $this->loadCart();
    }

    public function loadCart()
    {
        if (Auth::check()) {
            // Load cart items from database
            $this->cartItems = Cart::where('user_id', Auth::id())->with('product')->get()->toArray();
        } else {
            // Load cart items from session
            $this->cartItems = Session::get('cart', []);
        }
        $this->calculateTotalNumOfItems();
        $this->findSubtotal();
    }
    
    public function findSubtotal() 
    {
        if (Auth::check()) {
            $this->subTotal = collect($this->cartItems)->sum(fn($item) => $item['product']['price'] * $item['quantity']);
            return;
        }
        $this->subTotal = collect($this->cartItems)->sum(fn($item) => $item['price']*$item['quantity']);
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        if (Auth::check()) {
            // Save to database
            $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();
            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                    // 'primary_image' => $product->primaryImage,
                    // 'price' => $product->price,
                    'quantity' => 1,
                ]);
            }
        } else {
            // Save to session
            $cart = Session::get('cart', []);
            if (is_array($cart) && isset($cart[$productId])) {
                $cart[$productId]['quantity'] += 1;
            } else {
                $cart[$productId] = [
                    'product_id' => $product->id,
                    'title' => $product->title,
                    'price' => $product->price,
                    'primary_image' => $product->primary_image,
                    'quantity' => 1,
                ];
            }
            Session::put('cart', $cart);
        }

        $this->loadCart();
        $this->dispatch('cartUpdated'); // Notify the cart component to refresh
        $this->dispatch('showToast', 'Item added to cart'); // Show toast 
    }

    public function decreaseQuantity($productId)
    {
        $product = Product::findOrFail($productId);

        if (Auth::check()) {
            // Save to database
            $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();
            if ($cartItem->quantity == 1) {
                $this->removeFromCart($product->id);
            }
            if ($cartItem) {
                $cartItem->quantity -= 1;
                if ($cartItem->quantity == 1) {
                    $this->removeFromCart($product->id);
                }
                $cartItem->save();
            } else {
                $this->dispatch('showToast', 'No item'); // Show toast 
            }
        } else {
            // Save to session
            $cart = Session::get('cart', []);
            if ($cart[$productId]['quantity'] == 1) {
                $this->removeFromCart($cart[$productId]);
            }
            if (is_array($cart) && isset($cart[$productId])) {
                $cart[$productId]['quantity'] -= 1;
                // dd($cart[$productId]['quantity'] );
                if ($cart[$productId]['quantity'] == 1) {
                    // dd($cart[$productId]['quantity']);
                    $this->removeFromCart($cart[$productId]);
                }
            } else {
                $this->dispatch('showToast', 'No item'); // Show toast 
            }
            Session::put('cart', $cart);
        }

        $this->loadCart();
        $this->dispatch('cartUpdated'); // Notify the cart component to refresh
        $this->dispatch('showToast', 'Item Quantity decreased'); // Show toast 
    }

    public function removeFromCart($productId)
    {
        // dd($productId);
        if (Auth::check()) {
            $deleted = CartModel::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->delete();
   
            if ($deleted) {
                $this->dispatch('cartUpdated');
                $this->dispatch('showToast', 'Item removed from cart', 'success'); 
            } else {
                $this->dispatch('showToast', 'Failed to remove item', 'error'); 
            }       

        } else {
            $cart = Session::get('cart', []);
            if (is_array($cart) && isset($cart[$productId])) {
                unset($cart[$productId]);
                Session::put('cart', $cart);
                $this->dispatch('cartUpdated');
                $this->dispatch('showToast', 'Item removed from cart', 'success'); 
            } else {
                $this->dispatch('showToast', 'Item not found in cart', 'error'); 
            }
        }

        $this->loadCart();
    }

    public function render()
    {
        return view('livewire.cart', [
            'cartItems' => $this->cartItems,
        ]);
    }
}
