<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

use Illuminate\Pagination\Paginator;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
        Gate::define('admin', function (User $user) {
            return $user->is_Admin;
        });
    }
}