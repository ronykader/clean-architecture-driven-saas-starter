<?php

use App\Presentation\Http\Controllers\AuthController;
use App\Presentation\Http\Controllers\BillingController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');



Route::post('/register', [AuthController::class, 'register']);
Route::get('/billing/plans', [BillingController::class, 'plans'])
    ->middleware('auth');










Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
