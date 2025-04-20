<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;

class Cart extends Component
{
    // public $productId;
    public $cartItems = [];
    public $cartCount = 0;
    public $subTotal = 0;
    public $error;

    protected $cartService;

    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartItems = $this->cartService->getCartItems();
        $this->cartCount = $this->cartService->calculateCartCount($this->cartItems);
        $this->subTotal = $this->cartService->calculateSubtotal($this->cartItems);
    }

    public function addToCart($productId)
    {
        $this->cartService->addToCart($productId);
        $this->dispatch('cartUpdated'); // Notify the cart component to refresh
    }

    public function removeFromCart($productId)
    {
        $removed = $this->cartService->removeFromCart($productId);
        if ($removed) {
            $this->dispatch('cartUpdated');
        } else {
            $this->error('Could not find the item');
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }

     // public function decreaseQuantity($productId)
    // {
    //     $product = Product::findOrFail($productId);

    //     if (Auth::check()) {
    //         // Save to database
    //         $cartItem = CartModel::where('user_id', Auth::id())->where('product_id', $productId)->first();
    //         if ($cartItem->quantity == 1) {
    //             $this->removeFromCart($product->id);
    //         }
    //         if ($cartItem) {
    //             $cartItem->quantity -= 1;
    //             if ($cartItem->quantity == 1) {
    //                 $this->removeFromCart($product->id);
    //             }
    //             $cartItem->save();
    //         } else {
    //             $this->dispatch('showToast', 'No item'); // Show toast 
    //         }
    //     } else {
    //         // Save to session
    //         $cart = Session::get('cart', []);
    //         if ($cart[$productId]['quantity'] == 1) {
    //             $this->removeFromCart($cart[$productId]);
    //         }
    //         if (is_array($cart) && isset($cart[$productId])) {
    //             $cart[$productId]['quantity'] -= 1;
    //             // dd($cart[$productId]['quantity'] );
    //             if ($cart[$productId]['quantity'] == 1) {
    //                 // dd($cart[$productId]['quantity']);
    //                 $this->removeFromCart($cart[$productId]);
    //             }
    //         } else {
    //             $this->dispatch('showToast', 'No item'); // Show toast 
    //         }
    //         Session::put('cart', $cart);
    //     }

    //     $this->loadCart();
    //     $this->dispatch('cartUpdated'); // Notify the cart component to refresh
    //     $this->dispatch('showToast', 'Item Quantity decreased'); // Show toast 
    // }
}
