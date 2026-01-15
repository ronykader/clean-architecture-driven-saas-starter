<?php

use App\Infrastructure\Persistence\Eloquent\Models\Subscription;
use App\Infrastructure\Persistence\Eloquent\Models\User;

it('allows user to cancel subscription', function () {
    $user = User::factory()->create();

    Subscription::factory()->create([
        'user_id' => $user->id,
        'status' => 'active',
        'gateway_subscription_id' => 'sub_test',
    ]);

    $this->actingAs($user)
        ->post('/subscription/cancel')
        ->assertRedirect();

    $this->assertDatabaseHas('subscriptions', [
        'user_id' => $user->id,
        'status' => 'cancelled',
    ]);
});
