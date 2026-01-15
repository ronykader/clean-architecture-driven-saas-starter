<?php

namespace App\Presentation\Http\Middleware;

use App\Application\Subscription\HasActiveSubscriptionUseCase;
use Closure;
use Illuminate\Http\Request;

class EnsureActiveSubscription
{
    public function __construct(
        private HasActiveSubscriptionUseCase $useCase
    ) {}

    public function handle(Request $request, Closure $next)
    {
        if (! $this->useCase->execute($request->user()->id)) {
            return redirect()->route('billing.plans');
        }

        return $next($request);
    }
}
