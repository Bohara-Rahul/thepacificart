<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Wishlist;

class OtherPageNav extends Component
{
    public $cartCount = 0;
    public $cartItems = [];
    public $wishlistCount = 0;

    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount()
    {
        $this->loadCart();
        $this->loadWishlistCount();
    }

    public function loadCart()
    {
        if (Auth::check()) {
            // Count items from database for logged-in users
            $this->cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            // Count items from session for guest users
            $this->cartItems = Session::get('cart', []);
        }
        $this->loadCartCount();
    }

    public function loadCartCount()
    {
        $this->cartCount = collect($this->cartItems)
            ->sum(fn($item) => $item['quantity']);   
    }
        

    public function loadWishlistCount()
    {
        if (Auth::check()) {
            $this->wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        }
    }

    public function render()
    {
        return view('livewire.other-page-nav');
    }
}
