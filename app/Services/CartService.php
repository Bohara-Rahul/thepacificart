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
          $items = Cart::where('user_id', Auth::id())->with('product')->get();
  
          return $items->map(function ($item) {
              return [
                  'product_id' => $item->product->id,
                  'title' => $item->product->title,
                  'price' => $item->product->price,
                  'quantity' => $item->quantity,
                  'product' => $item->product,
              ];
          });
      }
  
      $sessionCart = Session::get('cart', []);
      
      return collect($sessionCart)->map(function ($item) {
          $product = Product::find($item['product_id']);
          return [
              'product_id' => $product->id,
              'title' => $product->title,
              'price' => $product->price,
              'quantity' => $item['quantity'],
              'product' => $product,
          ];
      });
  }

    public function calculateCartCount($items)
    {
        return collect($items)->sum(fn($item) => $item['quantity']);
    }

    public function calculateSubtotal($items)
    {
      return collect($items)->sum(fn($item) => $item['price'] * $item['quantity']);
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        if (Auth::check()) {
            $cartItem = Cart::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->first();

            if ($cartItem) {
              throw ValidationException::withMessages([
                'error' => 'Item already added to cart',
              ]);
            }

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
            
            if (isset($cart[$productId])) {
              throw ValidationException::withMessages([
                'error' => 'Item already added to cart',
            ]);
            }

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
