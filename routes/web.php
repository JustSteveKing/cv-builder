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

        Route::prefix('qualifications')->as('qualifications:')->group(function () {
            Route::get('/', App\Http\Controllers\Web\Profile\Qualifications\ShowController::class)->name('show');
        });

        Route::prefix('shares')->as('shares:')->group(function () {
            Route::get('/', App\Http\Controllers\Web\Profile\Shares\ShowController::class)->name('show');
        });
    });
});

Route::get('view/{share:token}', App\Http\Controllers\Public\Profile\ShowController::class)->name('view:share');

Route::get('test', App\Http\Controllers\Web\Profile\DownloadController::class)->name('test');

require __DIR__ . '/auth.php';
