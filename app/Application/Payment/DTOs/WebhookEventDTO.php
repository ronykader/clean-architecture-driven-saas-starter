<?php

namespace App\Application\Payment\DTOs;

class WebhookEventDTO
{
    public function __construct(
        public string $eventId,
        public string $eventType,
        public string $checkoutSessionId,
        public string $stripeSubscriptionId,
    ) {}
}
