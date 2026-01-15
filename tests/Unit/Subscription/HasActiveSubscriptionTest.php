<?php

use App\Application\Subscription\HasActiveSubscriptionUseCase;
use App\Infrastructure\Persistence\Eloquent\Models\Subscription;
use App\Infrastructure\Persistence\Eloquent\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns true when user has active subscription', function () {

    $user = User::factory()->create();

    Subscription::create([
        'user_id' => $user->id,
        'plan_id' => 1,
        'status' => 'active',
    ]);

    $useCase = new HasActiveSubscriptionUseCase;

    expect($useCase->execute($user->id))->toBeTrue();
});
