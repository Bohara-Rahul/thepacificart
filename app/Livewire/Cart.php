<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart as CartModel;
use App\Models\Product;

class Cart extends Component
{
    public $cartItems = [];

    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount()
    {
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
