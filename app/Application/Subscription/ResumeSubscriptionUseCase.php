<?php

namespace App\Application\Subscription;

use App\Domain\Payment\Gateways\PaymwentGatewayInterface;
use App\Domain\Subscription\Enums\SubscriptionStatus;
use App\Infrastructure\Persistence\Eloquent\Models\Subscription;

class ResumeSubscriptionUseCase
{
    public function __construct(private PaymwentGatewayInterface $gateway) {}

    public function execute(int $userId): void
    {
        $subscription = Subscription::where('user_id', $userId)
            ->where('status', SubscriptionStatus::CANCELLED->value)
            ->firstOrFail();
        $this->gateway->resumeSubscription($subscription->gateway_subscription_id);
        $subscription->update([
            'status' => SubscriptionStatus::ACTIVE->value,
        ]);
    }
}
