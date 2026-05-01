<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Services\FileManagementService::class, function ($app) {
            return new \App\Services\FileManagementService();
        });
    }

    
    public function boot(): void
    {
        //
    }
}
