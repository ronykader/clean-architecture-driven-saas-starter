<?php

use App\Presentation\Http\Controllers\AuthController;
use App\Presentation\Http\Controllers\BillingController;
use App\Presentation\Http\Controllers\CheckoutController;
use App\Presentation\Http\Controllers\StripeWebhookController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

// Route::post('/register', [AuthController::class, 'register']);
Route::get('/billing/plans', [BillingController::class, 'plans'])
    ->middleware('auth')->name('billing.plans');

Route::post('/billing/checkout', CheckoutController::class)
    ->middleware('auth');

Route::get('/billing/success', function () {
    return Inertia::render('Billing/Success');
})->name('billing.success');
Route::get('/billing/cancel', function () {
    return Inertia::render('Billing/Cancel');
})->name('billing.cancel');

Route::get('/billing', [BillingController::class, 'index'])
    ->middleware('auth');

Route::post('/webhooks/stripe', StripeWebhookController::class);

Route::middleware(['auth', 'subscribed'])->group(function () {
    Route::get('/dashboard', fn () => inertia('Dashboard/Index'));
    Route::get('/premium/reports', fn () => 'Premium Content');
});

Route::get('/__debug/stripe-secret', function () {
    return config('services.stripe.webhook_secret')
        ? 'WEBHOOK SECRET LOADED'
        : 'WEBHOOK SECRET MISSING';
});

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('dashboard', function () {
//         return Inertia::render('dashboard');
//     })->name('dashboard');
// });

require __DIR__.'/settings.php';
