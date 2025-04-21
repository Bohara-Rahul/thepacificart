<?php

namespace App\Livewire;

use Stripe\Stripe;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Order;
use App\Services\CartService;

class CheckoutComponent extends Component
{
    public $email, $shipping_name, $shipping_address, $shipping_city, $shipping_zip, $shipping_country;
    public $paymentMethod = 'stripe';
    public $success;

    protected $cartService;

    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function mount()
    {
        if(Auth::check()) {
            $user = Auth::user();
            $this->email = $user->email;
            $this->shipping_name = $user->name;
            return;
        }
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

    $cart = $this->cartService->getCartItems();

    if (empty($cart)) {
        $this->addError('cart', 'Your cart is empty.');
        return;
    }

    // create new order
    $order = new Order();
    $order->user_id = Auth::id();
    $order->guest_email = Auth::check() ? null : $this->email;
    $order->shipping_name = $this->shipping_name;
    $order->shipping_address = $this->shipping_address;
    $order->shipping_city = $this->shipping_city;
    $order->shipping_zip = $this->shipping_zip;
    $order->shipping_country = $this->shipping_country;
    $order->status = 'pending';
    $order->is_paid = false;
    $order->total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    $order->save();

    // Create order items
    foreach ($cart as $item) {
        $order->items()->create([
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
    
        $stripeSession = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => array_values(collect($cart)->map(function ($item) {
                return [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => $item['title']],
                        'unit_amount' => $item['price'] * 100,
                    ],
                    'quantity' => $item['quantity'],
                ];
            })->toArray()),
            'mode' => 'payment',
            'customer_email' => Auth::check() 
                ? Auth::user()->email 
                : $this->email,
            'success_url' => route('checkout.success', [], true) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        // Save session ID to order
        $order->update(['session_id' => $stripeSession->id]);
    
        return redirect($stripeSession->url);
    }

    public function render()
    {
        return view('livewire.checkout-component');
    }
}
