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
            CartModel::where('user_id', Auth::id())->where('product_id', $productId)->delete();
        } else {
            $cart = Session::get('cart', []);
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }

        $this->loadCart();
        $this->emit('cartUpdated'); // Update cart everywhere
    }

    public function render()
    {
        return view('livewire.cart', [
            'cartItems' => $this->cartItems,
        ]);
    }
}
