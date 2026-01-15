<?php

use App\Application\Payment\DTOs\StartCheckoutDTO;
use App\Application\Payment\StartCheckoutUseCase;
use App\Domain\Payment\Gateways\PaymwentGatewayInterface;

it('starts checkout using gateway', function () {
    $fakeGateway = new class implements PaymwentGatewayInterface
    {
        public function createCheckout(...$args): array
        {
            return [
                'id' => 'sess_123',
                'url' => 'https://stripe.test',
            ];
        }
    };

    $useCase = new StartCheckoutUseCase($fakeGateway);
    $url = $useCase->execute(
        new StartCheckoutDTO(1, 'a@test.com', 'Pro Plan', 2000, 'usd', 'stripe')
    );
    expect($url)->toBe('https://stripe.test');
});
