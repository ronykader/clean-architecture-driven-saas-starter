<?php

namespace App\Domain\Subscription\Entities;

class SubscriptionEntity
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly int $id,
        public readonly int $userId,
        public readonly int $planId,
        public readonly string $status,
    ) {}
}
