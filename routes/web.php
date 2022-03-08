<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
    Route::get(
        'dashboard',
        App\Http\Controllers\Web\DashboardController::class,
    )->name('dashboard');

    Route::prefix('profile')->as('profile:')->group(function () {
        Route::get('/', App\Http\Controllers\Web\Profile\ShowController::class)->name('show');

        Route::prefix('experiences')->as('experiences:')->group(function () {
            Route::get('/', App\Http\Controllers\Web\Profile\Experiences\ShowController::class)->name('show');
        });
    });

});

require __DIR__ . '/auth.php';
