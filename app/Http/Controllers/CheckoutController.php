<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Mail\OrderInvoiceMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

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
           
            // Prevent duplicate order creation
            $existingOrder = Order::where('session_id', $session_id)->first();
            $existingOrder->update([
                'status' => 'paid',
                'is_paid' => true,
            ]);
           
            Log::info("Attempting to send invoice email to: " . $session->customer_email);
            Mail::to($session->customer_email)
                ->send(new OrderInvoiceMail($existingOrder));
            Log::info("Invoice email sent.");
            
            $existingOrder->update(['email_sent' => true]);
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