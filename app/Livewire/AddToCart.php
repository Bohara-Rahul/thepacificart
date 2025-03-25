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

    public function mount($productId)
    {
        $this->productId = $productId;
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
                    'title' => $product->title,
                    'price' => $product->price,
                    'quantity' => 1,
                ];
            }
            Session::put('cart', $cart);
        }

        $this->emit('cartUpdated'); // Notify the cart component to refresh
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}

