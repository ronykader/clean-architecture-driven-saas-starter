<?php

namespace App\Infrastructure\Payment\Stripe;

use App\Domain\Payment\Gateways\PaymwentGatewayInterface;
use Stripe\StripeClient;

class StripePaymentGateway implements PaymwentGatewayInterface
{
    private StripeClient $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }

    public function createCheckout(
        string $customerEmail,
        string $planName,
        int $amount,
        string $currency,
        string $successUrl,
        string $cancelUrl
    ): array {
        $session = $this->stripe->checkout->sessions->create([
            'mode' => 'payment',
            'customer_email' => $customerEmail,
            'line_items' => [[
                'quantity' => 1,
                'price_data' => [
                    'currency' => $currency,
                    'unit_amount' => $amount,
                    'product_data' => [
                        'name' => $planName,
                    ],
                ],
            ]],
            'success_url' => 'http://saas-starter.test/billing/success',
            'cancel_url' => 'http://saas-starter.test/billing/cancel',
        ]);

        return [
            'id' => $session->id,
            'url' => $session->url,
        ];
    }

    public function cancelSubscription(string $subscriptionId): void
    {
        $this->stripe->subscriptions->update($subscriptionId, [
            'cancel_at_period_end' => true,
        ]);
    }

    public function resumeSubscription(string $subscriptionId): void
    {
        $this->stripe->subscriptions->update($subscriptionId, [
            'cancel_at_period_end' => false,
        ]);
    }
}
