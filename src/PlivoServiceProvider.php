<?php

namespace DavidVarney\Plivo;

use Illuminate\Support\ServiceProvider;

class PlivoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/plivo.php', 'plivo');

        $this->app->singleton('plivo', function () {
            return new Plivo;
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/plivo.php' => base_path('config/plivo.php'),
        ]);
    }
}
