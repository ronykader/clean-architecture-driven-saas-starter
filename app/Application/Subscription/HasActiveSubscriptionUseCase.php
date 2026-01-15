<?php

namespace App\Application\Subscription;

use App\Domain\Subscription\Enums\SubscriptionStatus;
use App\Infrastructure\Persistence\Eloquent\Models\Subscription;

class HasActiveSubscriptionUseCase
{
    public function execute(int $userId): bool
    {
        return Subscription::where('user_id', $userId)
            ->where('status', SubscriptionStatus::ACTIVE->value)
            ->exists();
    }
}
