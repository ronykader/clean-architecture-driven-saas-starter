<?php

namespace App\Application\Payment;

use App\Application\Payment\DTOs\StartCheckoutDTO;
use App\Domain\Payment\Gateways\PaymwentGatewayInterface;
use App\Domain\Subscription\Enums\SubscriptionStatus;
use App\Infrastructure\Persistence\Eloquent\Models\Payment;
use App\Infrastructure\Persistence\Eloquent\Models\Subscription;

class StartCheckoutUseCase
{
    public function __construct( private PaymwentGatewayInterface $gateway)
    {}

    public function execute(StartCheckoutDTO $dto) : string
    {
        $checkout = $this->gateway->createCheckout(
            $dto->email,
            $dto->planName,
            $dto->amount,
            $dto->currency,
            $dto->gateway, 
            // 'http://saas-starter.test/billing/success',
            // 'http://saas-starter.test/billing/cancel',
            // // route('billing.success', [], true),
            // // route('billing.cancel', [], true),
            route('billing.success'),
            route('billing.cancel')
        );
        $subscription = Subscription::create([
            'user_id' => $dto->userId,
            'plan_id' => $dto->planId,
            'status' => SubscriptionStatus::PENDING->value,
        ]);
        Payment::create([
            'user_id' => $dto->userId,
            'subscription_id' => $subscription->id,
            'amount' => $dto->amount,
            'currency' => $dto->currency,
            'gateway' => $dto->gateway,
            'gateway_reference' => $checkout['id'],
            'status' => 'pending',
            'payload' => $checkout,
        ]);
        return $checkout['url'];
    }
}