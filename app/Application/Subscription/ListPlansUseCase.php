<?php

namespace App\Application\Subscription;

use App\Domain\Subscription\Repositories\PlanRepositoryInterface;

class ListPlansUseCase
{
    public function __construct(PlanRepositoryInterface $plans)
    {}
    public function execute(): array
    {
        return $this->plans->getActivePlans();
    }    
}