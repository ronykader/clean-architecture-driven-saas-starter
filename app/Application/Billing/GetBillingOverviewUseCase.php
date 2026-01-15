<?php 

namespace App\Application\Billing;

use App\Infrastructure\Persistence\Eloquent\Models\Payment;
use App\Infrastructure\Persistence\Eloquent\Models\Subscription;
use App\Presentation\ViewModels\PaymentViewModel;
use App\Presentation\ViewModels\SubscriptionViewModel;

class GetBillingOverviewUseCase
{
    public function execute(int $userId): array
    {
        $subscription = Subscription::with('plan')
            ->where('user_id', $userId)
            ->latest()
            ->first();

        $subscriptionVM = $subscription ? new SubscriptionViewModel(
            $subscription->id,
            $subscription->plan?->name,
            $subscription->status,
            $subscription->created_at,
            $subscription->updated_at
        ) : null;

        $payments = Payment::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn ($payment) => new PaymentViewModel(
                $payment->id,
                $payment->amount,
                $payment->currency,
                $payment->status,
                $payment->payment_method,
                $payment->transaction_id,
                $payment->description,
                $payment->created_at->toDateString(),
                $payment->updated_at ? $payment->updated_at->toDateString() : null
            ))
            ->toArray();

        return [
            'subscription' => $subscriptionVM,
            'payments' => $payments,
        ];
    }    
}