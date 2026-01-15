<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Subscription\CancelSubscriptionUseCase;
use App\Application\Subscription\ResumeSubscriptionUseCase;
use Illuminate\Http\Request;

class SubscriptionController
{
    public function cancel(
        Request $request,
        CancelSubscriptionUseCase $useCase
    ) {
        $useCase->execute($request->user()->id);

        return back();
    }

    public function resume(
        Request $request,
        ResumeSubscriptionUseCase $useCase
    ) {
        $useCase->execute($request->user()->id);

        return back();
    }
}
