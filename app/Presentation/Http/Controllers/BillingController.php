<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Subscription\ListPlansUseCase;
use Inertia\Inertia;

class BillingController
{
    
    public function plans(ListPlansUseCase $useCase)
    {
        return Inertia::render('Billing/Plans', [
            'plans' => $useCase->execute(),
        ]);
    }

}
