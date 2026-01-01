<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Middleware\VerifyCsrfToken;

uses(RefreshDatabase::class);

it('registers a user through http', function () {

    $this->withoutMiddleware();

    $response = $this->post('/register', [
        'name' => 'Tarik',
        'email' => 'tarik@test.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertRedirect('/dashboard');

    $this->assertDatabaseHas('users', [
        'email' => 'tarik@test.com',
    ]);

    expect(auth()->check())->toBeTrue();
});
