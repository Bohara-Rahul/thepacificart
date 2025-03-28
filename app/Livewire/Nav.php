<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Wishlist;

class Nav extends Component
{
    public $cartCount;
    public $wishlistCount = 0;

    protected $listeners = ['cartUpdated' => 'loadCartCount'];

    public function mount()
    {
        $this->loadCartCount();
        $this->loadWishlistCount();
    }

    public function loadCartCount()
    {
        if (Auth::check()) {
            // Count items from database for logged-in users
            $this->cartCount = Cart::where('user_id', Auth::id())->count();
        } else {
            // Count items from session for guest users
            $cart = Session::get('cart', []);
            $this->cartCount = count($cart);
        }
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
