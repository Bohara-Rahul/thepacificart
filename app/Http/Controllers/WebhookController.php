<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoiceMail;
use Stripe\Stripe;
use Stripe\Webhook;
use Symfony\Component\HttpKernel\Exception\HttpException;

class WebhookController extends Controller
{
    public function handleStripeWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sigHeader,
                config('services.stripe.webhook_secret')
            );
        } catch (\UnexpectedValueException $e) {
            Log::error('Invalid payload from Stripe', ['payload' => $payload]);
            return response('Invalid Payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            Log::error('Invalid Stripe signature');
            return response('Invalid Signature', 400);
        }

        Log::info('Stripe event received', ['type' => $event->type, 'event' => $event]);

        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                dd($session);

                $user = User::where('email', $session->customer_email)->first();
                $order = Order::create([
                    'user_id' => $user->id ?? null,
                    'stripe_session_id' => $session->id,
                    'amount_total' => $session->amount_total / 100,
                    'status' => 'paid',
                    'shipping_email' => $session->guest_email,
                    'shipping_address' => json_encode($session->shipping ?? []),
                ]);

                if ($user) {
                    Cart::where('user_id', $user->id)->delete();
                }

                $pdf = Pdf::loadView('emails.invoice_pdf', ['order' => $order]);
                Mail::to($session->customer_email)->send(new OrderInvoiceMail($order, $pdf));

                try {
                    $client = new Client(config('services.twilio.sid'), config('services.twilio.token'));
                    $client->messages->create(
                        $user->phone ?? '+0000000000',
                        [
                            'from' => config('services.twilio.from'),
                            'body' => "Your order #{$order->id} has been confirmed. Thank you for shopping with us!"
                        ]
                    );
                } catch (\Exception $e) {
                    Log::error('SMS failed: ' . $e->getMessage());
                }
                break;

            case 'payment_intent.payment_failed':
                $intent = $event->data->object;
                Log::warning('Payment failed', [
                    'id' => $intent->id,
                    'amount' => $intent->amount,
                    'customer' => $intent->customer,
                    'email' => $intent->receipt_email ?? null,
                    'failure_reason' => $intent->last_payment_error->message ?? 'Unknown'
                ]);
                break;
        }

        return response('Webhook handled', 200);
    }
}

