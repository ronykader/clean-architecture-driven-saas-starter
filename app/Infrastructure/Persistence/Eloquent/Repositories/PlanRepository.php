<?php

namespace App\Domain\Subscription\Repositories;
use App\Domain\Subscription\Entities\PlanEntity;
use App\Infrastructure\Persistence\Eloquent\Models\Plan;

class PlanRepository implements PlanRepositoryInterface
{
    public function getActivePlans(): array
    {
        return Plan::where('is_active', true)
            ->get()
            ->map(fn ($plan) => new PlanEntity(
                $plan->id,
                $plan->name,
                $plan->price,
                $plan->currency,
                $plan->is_active
            ))
            ->toArray();
    }
}