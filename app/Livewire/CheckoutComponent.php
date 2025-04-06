<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{
    public $email, $shipping_name, $shipping_address, $shipping_city, $shipping_zip, $shipping_country;
    public $success;

public function placeOrder()
{
    $this->validate([
        'shipping_name' => 'required|string',
        'shipping_address' => 'required|string',
        'shipping_city' => 'required|string',
        'shipping_zip' => 'required|string',
        'shipping_country' => 'required|string',
        'email' => Auth::check() ? 'nullable' : 'required|email',
    ]);

    $cart = Auth::check()
        ? Cart::with('product')->where('user_id', Auth::id())->get()
        : collect(session('cart', []))->map(function ($qty, $productId) {
            $product = Product::find($productId);
            return (object)[
                'product' => $product,
                'quantity' => $qty,
                'price' => $product->price,
            ];
        });

    if ($cart->isEmpty()) {
        $this->addError('cart', 'Your cart is empty.');
        return;
    }

    // Create order
    $order = Order::create([
        'user_id' => Auth::id(),
        'guest_email' => Auth::check() ? null : $this->email,
        'shipping_name' => $this->shipping_name,
        'shipping_address' => $this->shipping_address,
        'shipping_city' => $this->shipping_city,
        'shipping_zip' => $this->shipping_zip,
        'shipping_country' => $this->shipping_country,
        'status' => 'pending',
        'total' => $cart->sum(fn($item) => $item->price * $item->quantity['quantity']),
    ]);

    // Create order items
    foreach ($cart as $item) {
        $order->items()->create([
            'product_id' => $item->product->id,
            'quantity' => $item->quantity['quantity'],
            'price' => $item->price,
        ]);
    }

    // Clear cart
    Auth::check()
        ? Cart::where('user_id', Auth::id())->delete()
        : session()->forget('cart');

    // Send invoice email
    Mail::to(Auth::id() ? Auth::user()->email : $this->email)
        ->send(new \App\Mail\OrderInvoiceMail($order));

    $this->success = "Order placed successfully! Check your email for the invoice.";
}   
    public function render()
    {
        return view('livewire.checkout-component');
    }
}
