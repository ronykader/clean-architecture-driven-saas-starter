<?php

use App\Infrastructure\Persistence\Eloquent\Models\Subscription;
use App\Infrastructure\Persistence\Eloquent\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows user with active subscription', function () {

    $user = User::factory()->create();

    Subscription::create([
        'user_id' => $user->id,
        'plan_id' => 1,
        'status' => 'active',
    ]);

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertOk();
});
