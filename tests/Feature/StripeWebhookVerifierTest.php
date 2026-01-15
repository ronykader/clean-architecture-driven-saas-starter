<?php

use App\Infrastructure\Payment\Stripe\StripeWebhookVerifier;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('accepts valid webhook signatures', function () {
    $this->mock(StripeWebhookVerifier::class, function ($mock) {
        $mock->shouldReceive('verify')->andReturn((object) [
            'id' => 'evt_1',
            'type' => 'checkout.session.completed',
            'data' => (object) [
                'object' => (object) ['id' => 'sess_123'],
            ],
        ]);
    });

    $this->post('/webhooks/stripe', [], [
        'Stripe-Signature' => 'valid',
    ])->assertOk();
});
