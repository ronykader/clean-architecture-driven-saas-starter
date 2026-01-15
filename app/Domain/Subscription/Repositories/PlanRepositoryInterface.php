<?php

namespace App\Domain\Subscription\Repositories;

use App\Domain\Subscription\Entities\PlanEntity;
use App\Domain\Subscription\Entities\SubscriptionEntity;

interface PlanRepositoryInterface
{
    /** @return PlanEntity[] */
    public function getActivePlans(): array;
}

interface SubscriptionRepositoryInterface
{
    public function create(
        int $userId,
        int $planId,
        string $status
    ): SubscriptionEntity;
}
