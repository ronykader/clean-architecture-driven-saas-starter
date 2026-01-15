<?php

namespace App\Application\Payment;

use App\Application\Payment\DTOs\WebhookEventDTO;
use App\Domain\Payment\Enums\PaymentStatus;
use App\Domain\Subscription\Enums\SubscriptionStatus;
use App\Infrastructure\Persistence\Eloquent\Models\Payment;
use App\Infrastructure\Persistence\Eloquent\Models\Subscription;
use App\Infrastructure\Persistence\Eloquent\Models\WebhookEvent;

class HandleSuccessfulPaymentUseCase
{
    public function execute(WebhookEventDTO $dto): void
    {
        if (WebhookEvent::where('event_id', $dto->eventId)->exists()) {
            return;
        }

        $payment = Payment::where(
            'gateway_reference',
            $dto->checkoutSessionId
        )->firstOrFail();

        $payment->update([
            'status' => PaymentStatus::PAID->value,
        ]);

        Subscription::where('id', $payment->subscription_id)->update([
            'status' => SubscriptionStatus::ACTIVE->value,
            'gateway_subscription_id' => $dto->stripeSubscriptionId,
        ]);

        WebhookEvent::create([
            'gateway' => 'stripe',
            'event_id' => $dto->eventId,
            'event_type' => $dto->eventType,
        ]);
    }
}
