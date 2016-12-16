<?php

namespace App\Lumen\Providers;

use Illuminate\Contracts\Foundation\Application;
use Orchestra\Extension\ExtensionServiceProvider as ServiceProvider;

class FoundationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->registerFoundation();
    }

    /**
     * Register the service provider for foundation.
     *
     * @return void
     */
    protected function registerFoundation()
    {
        $this->app['orchestra.installed'] = false;

        $this->app->singleton('orchestra.app', function (Application $app) {
            return new Foundation($app, new RouteResolver($app));
        });
    }
}
