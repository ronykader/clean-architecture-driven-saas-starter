<?php

use App\Application\Payment\DTOs\WebhookEventDTO;
use App\Application\Payment\HandleSuccessfulPaymentUseCase;
use App\Infrastructure\Persistence\Eloquent\Models\Payment;
use App\Infrastructure\Persistence\Eloquent\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('active subscription after payment is successful', function () {
    $subscription = Subscription::factory()->create([
        'status' => 'pending',
    ]);
    $payment = Payment::factory()->create([
        'subscription_id' => $subscription->id,
        'status' => 'pending',
        'gateway_reference' => 'cs_test_12345',
    ]);

    $useCase = new HandleSuccessfulPaymentUseCase;
    $useCase->execute(
        new WebhookEventDTO('evt_12345', 'checkout.session.completed', 'cs_test_12345')
    );
    expect($payment->fresh()->status)->toBe('paid');
    expect($subscription->fresh()->status)->toBe('active');
});
