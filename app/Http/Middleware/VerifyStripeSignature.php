<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Stripe\Webhook;

class VerifyStripeSignature
{
    public function handle(Request $request, Closure $next)
    {
        $payload = $request->getContent();
        $sigHeader = $request->server('HTTP_STRIPE_SIGNATURE');
        $secret = config('services.stripe.webhook_secret');

        try {
            Webhook::constructEvent($payload, $sigHeader, $secret);
        } catch (\UnexpectedValueException $e) {
            Log::error('Stripe Webhook: Invalid Payload', [
                'error' => $e->getMessage(),
                'payload' => $payload,
            ]);
            throw new HttpException(400, 'Invalid payload');
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            throw new HttpException(403, 'Invalid signature');
        }

        return $next($request);
    }
}
