<?php

namespace App\Providers;

use App\Medods\Medods;
use App\Services\Sms\SmsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('sms', function (Application $app) {
            return (new SmsService())->smsService();
        });

        $this->app->bind('medods', function (Application $app) {
            return new Medods();
        });
    }

    public function boot(): void
    {
        Vite::macro('image', function ($asset) {
            return $this->asset("resources/images/{$asset}");
        });

        Str::macro('phoneNumber', function ($string) {
            return preg_replace('/^8{1}/', '7', preg_replace('/[^0-9]/', '', $string));
        });

        Paginator::useBootstrapFive();
    }
}
