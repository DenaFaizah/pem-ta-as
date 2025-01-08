<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\RoleMiddleware; // Pastikan ini ada

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    // Daftarkan alias middleware
    $this->app['router']->aliasMiddleware('role', \App\Http\Middleware\RoleMiddleware::class);
}

}
