<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Composers\CartComposer;
use Illuminate\Support\Facades\View;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CartComposer::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['*'], CartComposer::class);
    }
}
