<?php

namespace LvlupDev\ScreenshotApiLaravel;

use Illuminate\Support\ServiceProvider;

class ScreenshotApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/screenshot-api.php' => config_path('screenshot-api.php'),
        ], ['config']);
    }

    public function register()
    {
//        $this->app->bind(ScreenshotApiService::class, function ($app) {
//            return new ScreenshotApiService();
//        });

        $this->app->singleton(ScreenshotApiService::class, function () {
            return new ScreenshotApiService();
        });
    }
}
