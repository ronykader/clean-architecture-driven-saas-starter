<?php

namespace App\Application\Payment;

use App\Application\Payment\DTOs\StartCheckoutDTO;
use App\Domain\Payment\Gateways\PaymwentGatewayInterface;
use App\Infrastructure\Persistence\Eloquent\Models\Payment;

class StartCheckoutUseCase
{
    public function __construct( private PaymwentGatewayInterface $gateway)
    {}

    public function execute(StartCheckoutDTO $dto) : string
    {
        $checkout = $this->gateway->createCheckout(
            $dto->email,
            $dto->planName,
            $dto->amount,
            $dto->currency,
            route('billing.success'),
            route('billing.cancel')
        );

        Payment::create([
            'user_id' => $dto->userId,
            'amount' => $dto->amount,
            'currency' => $dto->currency,
            'gateway' => 'stripe',
            'gateway_reference' => $checkout['id'],
            'status' => 'pending',
            'payload' => $checkout,
        ]);
        return $checkout['url'];
    }
}