<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Infrastructure\Persistence\Eloquent\Models\User;

uses(RefreshDatabase::class);

it('redirects user without active subscription', function () {

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertRedirect('/billing/plans');
});