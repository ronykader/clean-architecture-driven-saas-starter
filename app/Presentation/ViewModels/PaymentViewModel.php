<?php

namespace App\Presentation\ViewModels;

class PaymentViewModel
{
    public function __construct(
        public int $id,
        public string $status,
        public float $amount,
        public string $currency,
        public ?string $paidAt,
    ) {}
}