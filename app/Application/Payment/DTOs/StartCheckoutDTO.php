<?php

namespace App\Application\Payment\DTOs;

class StartCheckoutDTO
{
    public function __construct(
        public int $userId,
        public string $email,
        public string $planName,
        public int $amount,
        public string $currency
    )
    {}
}