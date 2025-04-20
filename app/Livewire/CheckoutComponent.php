<?php

namespace App\Livewire;

use Stripe\Stripe;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class CheckoutComponent extends Component
{
    public $user, $email, $shipping_name, $shipping_address, $shipping_city, $shipping_zip, $shipping_country;
    public $paymentMethod = 'stripe';
    public $success;

    public function mount()
    {
        $this->user = Auth::user() ?? null;
    }


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

    $cart = $this->user
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

    $order =  null;

    if (Auth::check()) {

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
            'total' => $cart->sum(fn($item) => $item->product->price * $item->quantity),
            // 'total' => Auth::check() ?
            // $cart->sum(fn($item) => $item->price * $item->quantity['quantity'])  : $cart->sum(fn($item) => $item->price * $item->quantity),
            'is_paid' => false,
        ]);

        // Create order items
        foreach ($cart as $item) {
            $order->items()->create([
                'product_id' => $item->product->id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }
    } else {
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
            'total' => $cart->sum(fn($item) => $item->price * $item->quantity['quantity']) ,
            'is_paid' => false,
        ]);

        // Create order items
        foreach ($cart as $item) {
            $order->items()->create([
                'product_id' => $item->product->id,
                'quantity' => $item->quantity['quantity'],
                'price' => $item->price,
            ]);
        }
    }

    dd($cart);

    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
    
        $stripeSession = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => array_values($cart->map(function ($item) {
                return [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => $item->product->title],
                        'unit_amount' => (int) $item->product->price * 100, // cents
                    ],
                    // 'quantity' => $item->quantity['quantity']
                    'quantity' => $item->quantity['quantity'] ?? $item->quantity,
                ];
            })->toArray()),
            'mode' => 'payment',
            'customer_email' => Auth::user()->email ?? $this->email,
            'success_url' => route('checkout.success', [], true) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        // Save session_id
        $order->update(['session_id' => $stripeSession->id]);

        $this->success = "Order placed successfully! Check your email for the invoice.";
    
        return redirect($stripeSession->url);
}   
    public function render()
    {
        return view('livewire.checkout-component');
    }
}
