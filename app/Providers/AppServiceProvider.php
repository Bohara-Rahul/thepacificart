<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("visitAdminPages", function($user) {
            return $user->isAdmin === 1;
        });
        app()->setLocale($this->getLocaleFromDomain());
    }

    public function getLocaleFromDomain()
    {
        $host = request()->getHost();

        if (Str::endsWith($host, '.co')) {
            return 'co';
        }

        return 'en';
    }
}
