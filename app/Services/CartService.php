<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Validation\ValidationException;

class CartService
{
    public function getCartItems()
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::id())
                ->with('product')
                ->get()
                ->toArray();
        }

        return Session::get('cart', []);
    }

    public function calculateCartCount($items)
    {
        return collect($items)->sum(fn($item) => $item['quantity']);
    }

    public function calculateSubtotal($items)
    {
        return Auth::check()
            ? collect($items)->sum(fn($item) => $item['product']['price'] * $item['quantity'])
            : collect($items)->sum(fn($item) => $item['price'] * $item['quantity']);
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        if (Auth::check()) {
            $cartItem = Cart::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->first();

            if ($cartItem) return;

            $created = Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);

            if (!$created) {
                throw ValidationException::withMessages([
                    'error' => 'Cannot add to cart',
                ]);
            }
        } else {
            $cart = Session::get('cart', []);
            if (isset($cart[$productId])) return;

            $cart[$productId] = [
                'product_id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'primary_image' => $product->primary_image,
                'quantity' => 1,
            ];

            Session::put('cart', $cart);
        }
    }

    public function removeFromCart($productId)
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->delete();
        }

        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
            return true;
        }

        return false;
    }
}
