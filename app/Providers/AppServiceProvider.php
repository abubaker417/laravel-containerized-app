<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Only register Telescope on non-production environments
        if ($this->app->environment(['local', 'dev', 'staging', 'qa'])) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') !== 'production') {
            Request::setTrustedProxies(
                ['*'],
                Request::HEADER_X_FORWARDED_FOR
            );
        }

        if (config('app.env') === 'dev' || config('app.env') === 'staging' || config('app.env') === 'qa' || config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
