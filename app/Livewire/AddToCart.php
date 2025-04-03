<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class AddToCart extends Component
{
    public $productId; // Declare the variable
    public $cartItems = [];

    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount($productId)
    {
        $this->productId = $productId;
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

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        if (Auth::check()) {
            // Save to database
            $cartItem = Cart::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->first();
            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
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
        $this->dispatch('cartUpdated'); // Notify the cart component to refresh
        $this->dispatch('showToast', 'Item added to cart'); // Show toast 
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}

