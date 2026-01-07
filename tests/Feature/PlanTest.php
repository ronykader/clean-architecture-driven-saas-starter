<?php

use App\Infrastructure\Persistence\Eloquent\Models\Plan;
use App\Infrastructure\Persistence\Eloquent\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('Show active plans to authenticated user', function(){
    $user = User::factory()->create();
    Plan::create([
        'name' => 'Basic',
        'slug' => 'basic',
        'price' => 1000,
        'currency' => 'usd',
        'is_active' => true,
    ]);

    $this->actingAs($user)
        ->get('/billing/plans')
        ->assertStatus(200)
        ->assertSee('Basic');

});