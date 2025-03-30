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
            $this->cartItems = Cart::where('user_id', Auth::id())->with('product')->get()-toArray();
        } else {
            // Load cart items from session
            $this->cartItems = Session::get('cart', []);
        }
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
            if (isset($cart[$productId])) {
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

    public function removeFromCart($productId)
    {
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
            if (isset($cart[$productId])) {
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
