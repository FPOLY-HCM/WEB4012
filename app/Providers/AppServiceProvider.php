<?php

declare(strict_types=1);

namespace App\Providers;

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
        $this->app->booted(function () {
            config()->set('analytics.service_account_credentials_json', storage_path('app/analytics/polycasts-01d8af3fb2a9.json'));
        });
    }
}
