<?php

namespace App\Presentation\Http\Middleware;

use App\Application\Subscription\HasActiveSubscriptionUseCase;
use Closure;
use Illuminate\Http\Request;

class EnsureActiveSubscription
{
    public function handle(Request $request, Closure $next, HasActiveSubscriptionUseCase $useCase)
    {
        if (! $useCase->execute($request->user()->id)) {
            return redirect()->route('billing.plans');
        }
        return $next($request);
    }
}