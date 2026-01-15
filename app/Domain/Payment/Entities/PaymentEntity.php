<?php

namespace App\Domain\Payment\Entities;

class PaymentEntity
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public int $id,
        public int $userId,
        public int $amount,
        public string $currency,
        public string $gateway,
        public string $status
    ) {}
}
