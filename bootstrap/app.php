<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Vendor;
use App\Http\Middleware\VendorVerification;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')->prefix('admin')->name('admin.')->group(base_path('routes/admin.php'));
            Route::middleware('web')->prefix('vendor')->name('vendor.')->group(base_path('routes/vendor.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => Admin::class,
            'vendor' => Vendor::class,
            'vendor_verified' => VendorVerification::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
