<?php

namespace App\Application\Subscription;

use App\Domain\Subscription\Enums\SubscriptionStatus;
use App\Domain\Subscription\Repositories\SubscriptionRepositoryInterface;

class CreateSubscriptionUseCase
{
    public function __construct(private SubscriptionRepositoryInterface $subscriptions) {}

    public function execute(int $userId, int $planId)
    {
        return $this->subscriptions->create($userId, $planId, SubscriptionStatus::PENDING->value);
    }
}
