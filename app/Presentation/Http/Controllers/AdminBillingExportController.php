<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Billing\ExportBillingCsvUseCase;

class AdminBillingExportController
{
    public function __invoke(ExportBillingCsvUseCase $useCase)
    {
        return $useCase->execute();
    }
}
