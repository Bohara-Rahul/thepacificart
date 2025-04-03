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
    public $cartCount = 0;
    public $subTotal = 0;

    protected $listeners = [
        'cartUpdated' => 'loadCart'
    ];

    public function mount()
    {
        // $this->productId = $productId;
        $this->loadCart();
    }

    public function calculateTotalNumOfItems()
    {
        $this->cartCount = collect($this->cartItems)->sum(fn($item) => $item['quantity']);
    }

    public function loadCart()
    {
        if (Auth::check()) {
            // Load cart items from database
            $this->cartItems = CartModel::where('user_id', Auth::id())
                ->with('product')
                ->get()
                ->toArray();
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
            $cartItem = CartModel::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->first();
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
        $this->dispatch('cartUpdated'); // Notify the cart component to refresh
        $this->dispatch('showToast', 'Item added to cart'); // Show toast 
    }

    public function decreaseQuantity($productId)
    {
        $product = Product::findOrFail($productId);

        if (Auth::check()) {
            // Save to database
            $cartItem = CartModel::where('user_id', Auth::id())->where('product_id', $productId)->first();
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
            $cart = Session::get('cart', []);
            if (!empty($cart) && is_array($cart) && isset($cart[$productId])) {
                if (isset($cart[$productId]['quantity']) && $cart[$productId]['quantity'] > 1) {
                    // Reduce quantity by 1
                    $cart[$productId]['quantity']--;
                } else {
                    // Remove item completely if quantity is 1
                    unset($cart[$productId]);
                    // {{ dd($cart[$productId]['quantity']); }}
                   }   
                }
            Session::put('cart', $cart);
        }
        $this->dispatch('cartUpdated'); // Notify the cart component to refresh
        $this->dispatch('showToast', 'Item Quantity decreased'); // Show toast 
    }

    public function removeFromCart($productId)
    {
        if (Auth::check()) {
            $deleted = CartModel::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->delete();
   
            if ($deleted) {
                $this->dispatch('cartUpdated');
            } else {
                $this->dispatch('showToast', 'Failed to remove item', 'error'); 
            }       

        } else {
            $cart = Session::get('cart', []);
            if (!empty($cart) && is_array($cart) && isset($cart[$productId])) {
                // Remove item completely if quantity is 1
                unset($cart[$productId]);   
            }
            Session::put('cart', $cart);
            $this->dispatch('cartUpdated');
        }
        $this->dispatch('cartUpdated');
        $this->dispatch('subtotalUpdated', $this->cartItems); 
        $this->dispatch('showToast', 'Item removed from cart', 'success');    
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
