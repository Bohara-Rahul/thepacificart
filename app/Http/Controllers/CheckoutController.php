<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Mail\OrderInvoiceMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    public function success(Request $request)
    {
        
        $session_id = $request->get('session_id');

        if (!$session_id) {
            return redirect()->route('checkout')->with('error', 'Missing session ID.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = StripeSession::retrieve($session_id);

            // Optional: also retrieve PaymentIntent for more info
            // $paymentIntent = PaymentIntent::retrieve($session->payment_intent);

            // Prevent duplicate order creation
            $existingOrder = Order::where('session_id', $session_id)->first();
            
            $existingOrder->update([
                'status' => 'paid',
                'is_paid' => true,
            ]);
            // dd($existingOrder);
            // send email to customer 
            Mail::to($session->customer_email)->send(new OrderInvoiceMail($existingOrder));

            $existingOrder->update(['email_sent' => true]);

            // Auth::check() ? 
            //     Cart::where('user_id', Auth::id())->delete() : 
            //     Session::forget('cart');
            
            // $user = User::where('email', Auth::user()->email)->first();

            // if ($user) {
            //     Cart::where('user_id', Auth::id())->delete();
            // } else {
            //     Session::forget('cart');
            // }

            return view('checkout.success', ['order' => $existingOrder]);
        } catch (\Exception $e) {
            Log::error("Stripe Checkout success error: " . $e->getMessage());
            return redirect()->route('checkout')->with('error', 'Unable to verify payment.');
        }
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}