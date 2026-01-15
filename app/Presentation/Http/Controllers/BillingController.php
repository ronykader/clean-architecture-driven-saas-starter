<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Billing\GetBillingOverviewUseCase;
use App\Application\Subscription\ListPlansUseCase;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BillingController
{
    public function index(Request $request, GetBillingOverviewUseCase $useCase)
    {
        return Inertia::render('Billing/Dashboard', $useCase->execute($request->user()->id));
    }

    public function plans(ListPlansUseCase $useCase)
    {
        return Inertia::render('Billing/Plans', [
            'plans' => $useCase->execute(),
        ]);
    }
}
