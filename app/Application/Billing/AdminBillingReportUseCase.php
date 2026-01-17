<?php

namespace App\Application\Billing;

use App\Infrastructure\Persistence\Eloquent\Models\Payment;
use App\Infrastructure\Persistence\Eloquent\Models\Subscription;

class AdminBillingReportUseCase
{
    public function __construct() {}

    public function execute(array $filters = []): array
    {
        $subscriptions = Subscription::with(['user', 'plan'])
            ->latest()
            ->get()
            ->map(fn($s) => [
                'id' => $s->id,
                'user_email' => $s->user->email,
                'plan_name' => $s->plan->name,
                'status' => $s->status,
                'stripe_subscription_id' => $s->gateway_subscription_id,
                'started_at' => $s->created_at->toDateTimeString(),
            ]);
        // $payments = Payment::with('user')
        //     ->latest()
        //     ->get()
        //     ->map(fn($p) => [
        //         'id' => $p->id,
        //         'user_email' => $p->user->email,
        //         'amount' => $p->amount,
        //         'currency' => $p->currency,
        //         'status' => $p->status,
        //         'stripe_reference' => $p->gateway_reference,
        //         'created_at' => $p->created_at?->toDateTimeString(),
        //     ]);

        // return [
        //     'subscriptions' => $subscriptions,
        //     'payments' => $payments,
        // ];

        $paymentsQuery = Payment::with('user');
        if (! empty($filters['status'])) {
            $paymentsQuery->where('status', $filters['status']);
        }

        if (! empty($filters['from'])) {
            $paymentsQuery->whereDate('created_at', '>=', $filters['from']);
        }

        if (! empty($filters['to'])) {
            $paymentsQuery->whereDate('created_at', '<=', $filters['to']);
        }

        $payments = $paymentsQuery->latest()->get();

        return compact('payments', 'subscriptions');
    }
}
