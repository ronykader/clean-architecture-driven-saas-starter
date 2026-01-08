<?php

namespace App\Domain\Payment\Gateways;

interface PaymwentGatewayInterface
{
    public function createCheckout(
        string $customerEmail,
        string $planName,
        int $amount,
        string $currency,
        string $successurl,
        string $cancelurl
    ) : array;
}
