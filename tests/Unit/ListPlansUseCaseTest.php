<?php

use App\Application\Subscription\ListPlansUseCase;
use App\Domain\Subscription\Entities\PlanEntity;
use App\Domain\Subscription\Repositories\PlanRepositoryInterface;

it('lists active plans', function () {

    $fakeRepo = new class implements PlanRepositoryInterface
    {
        public function getActivePlans(): array
        {
            return [
                new PlanEntity(1, 'Basic', 1000, 'usd', true),
                new PlanEntity(2, 'Pro', 2000, 'usd', false),
            ];
        }
    };
    $useCase = new ListPlansUseCase($fakeRepo);
    $plans = $useCase->execute();
    expect($plans)->toHaveCount(2);

});
