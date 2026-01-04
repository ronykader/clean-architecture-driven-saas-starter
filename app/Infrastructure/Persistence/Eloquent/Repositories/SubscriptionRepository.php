<?php

namespace App\Domain\Subscription\Repositories;

use App\Domain\Subscription\Entities\SubscriptionEntity;
use App\Infrastructure\Persistence\Eloquent\Models\Subscription;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    public function create( int $userId, int $planId, string $status ): SubscriptionEntity 
    {
        $subscription = Subscription::create([
            'user_id' => $userId,
            'plan_id' => $planId,
            'status' => $status,
        ]);

        return new SubscriptionEntity(
            $subscription->id,
            $subscription->user_id,
            $subscription->plan_id,
            $subscription->status
        );
    }
}