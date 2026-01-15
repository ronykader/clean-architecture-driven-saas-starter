<?php

use App\Infrastructure\Persistence\Eloquent\Models\User;

it('allows admin to view billing report', function () {
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin)
        ->get('/admin/billing')
        ->assertOk()
        ->assertSee('Subscriptions');
});

it('blocks non-admin from billing report', function () {
    $user = User::factory()->create(['is_admin' => false]);

    $this->actingAs($user)
        ->get('/admin/billing')
        ->assertForbidden();
});
