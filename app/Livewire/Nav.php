<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Wishlist;

class Nav extends Component
{
    public $cartItems = [];
    public $cart;
    public $cartCount;
    public $wishlistCount = 0;

    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount()
    {
        // $this->cart = Session::get('cart', []);
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
        $this->loadCartCount();
        $this->loadWishlistCount();
    }

    public function loadCartCount()
    {
        $this->cartCount = collect($this->cartItems)->sum(fn($item) => $item['quantity']);
    }

    public function loadWishlistCount()
    {
        if (Auth::check()) {
            $this->wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        }
    }

    public function render()
    {
        return view('livewire.nav');
    }
}
