<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObservableServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
}
