<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
    Route::get(
        'dashboard',
        App\Http\Controllers\Web\DashboardController::class,
    )->name('dashboard');
});

require __DIR__ . '/auth.php';
