<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Billing\AdminBillingReportUseCase;

class AdminBillingController
{
    public function index(AdminBillingReportUseCase $useCase)
    {
        return inertia('Billing/AdminDashboard', $useCase->execute());
    }
}
