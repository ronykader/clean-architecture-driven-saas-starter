<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Payment\DTOs\StartCheckoutDTO;
use App\Application\Payment\StartCheckoutUseCase;
use Illuminate\Http\Request;

class CheckoutController
{
    public function __invoke(Request $request, StartCheckoutUseCase $useCase)
    {
        $user = $request->user();

        $url = $useCase->execute(
            new StartCheckoutDTO(
                $user->id,
                $user->email,
                $request->plan_name,
                $request->amount,
                $request->currency
            )
        );
        return redirect()->away($url);
    }
}