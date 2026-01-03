<?php

namespace App\Domain\Subscription\Entities;

class PlanEntity
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly int $price,
        public readonly string $currency,
        public readonly bool $isActive,
    )
    {}
}
