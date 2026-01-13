<?php

namespace App\Infrastructure\Payment\Stripe;

use Stripe\Webhook;

class StripeWebhookVerifier
{
    public function verify(string $payload, string $signature): object
    {
        return Webhook::constructEvent(
            $payload,
            $signature,
            config('services.stripe.webhook_secret')
        );
    }
}