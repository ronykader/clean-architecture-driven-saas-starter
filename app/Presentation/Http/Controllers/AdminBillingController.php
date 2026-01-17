<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Billing\AdminBillingReportUseCase;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminBillingController
{
    public function index(Request $request, AdminBillingReportUseCase $useCase)
    {
        // return inertia('Billing/AdminDashboard', $useCase->execute());
        return Inertia::render(
        'Billing/AdminDashboard',
        $useCase->execute($request->only('status', 'from', 'to'))
    );
    }
}
