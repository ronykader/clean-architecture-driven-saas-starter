<?php

namespace App\Presentation\ViewModels;

class PaymentViewModel
{
    public function __construct(
        public int $id,
        public float $amount,
        public string $currency,
        public string $status,
        public ?string $paidAt,
    ) {}
}
