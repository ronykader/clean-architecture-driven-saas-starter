<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Payment\DTOs\WebhookEventDTO;
use App\Application\Payment\HandleSuccessfulPaymentUseCase;
use App\Infrastructure\Payment\Stripe\StripeWebhookVerifier;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StripeWebhookController
{
    public function __invoke(
        Request $request,
        StripeWebhookVerifier $verifier,
        HandleSuccessfulPaymentUseCase $useCase
    )
    {
        try {
            $event = $verifier->verify(
                $request->getContent(),
                $request->header('Stripe-Signature')
            );
        } catch (\Exception $e) {
            return response('Invalid signature', 400);
        }
        if ($event->type === 'checkout.session.completed') {
            $useCase->execute(
                new WebhookEventDTO(
                    $event->id,
                    $event->type,
                    $event->data->object->id
                )
            );
        }
        return response('ok', Response::HTTP_OK); 
    }
}