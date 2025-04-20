<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;

class AddToCart extends Component
{
    public $productId; // Declare the variable
    public $cartItems = [];
    protected $cartService;

    protected $listeners = ['cartUpdated' => 'loadCart'];
    
    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartItems = $this->cartService->getCartItems();
    }

    public function addToCart($productId)
    {
        $this->cartService->addToCart($productId);
        $this->dispatch('cartUpdated'); // Notify the cart component to refresh
        $this->dispatch('showToast', 'Item added to cart'); // Show toast 
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}

