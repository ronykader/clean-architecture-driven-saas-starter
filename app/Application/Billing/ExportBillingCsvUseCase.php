<?php

namespace App\Application\Billing;

use App\Infrastructure\Persistence\Eloquent\Models\Payment;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportBillingCsvUseCase
{
    public function __construct() {}

    public function execute(): StreamedResponse
    {
        return response()->streamDownload(function () {
            $output = fopen('php://output', 'w');
            // Write CSV headers
            fputcsv($output, ['Payment ID', 'User Email', 'Amount', 'Currency', 'Status', 'Gateway Ref', 'Date']);
            // Fetch payments and write to CSV
            $payments = Payment::with('user')
                ->chunk(500, function ($payments) use ($output) {
                    foreach ($payments as $payment) {
                        fputcsv($output, [
                            $payment->id,
                            $payment->user->email,
                            $payment->amount,
                            $payment->currency,
                            $payment->status,
                            $payment->gateway_reference,
                            $payment->created_at?->toDateTimeString(),
                        ]);
                    }
                });
            fclose($output);
        }, 'billing_report.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }
}
