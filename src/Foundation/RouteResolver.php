<?php

namespace Laravel\Lumen\Foundation;

use Orchestra\Extension\RouteGenerator;
use Orchestra\Foundation\RouteResolver as BaseRouteResolver;

class RouteResolver extends BaseRouteResolver
{
    /**
     * {@inheritdoc}
     */
    protected function generateRouteByName($name, $default = null)
    {
        $prefix = '/';

        // Orchestra Platform routing is managed by `orchestra/foundation::handles`
        // and can be manage using configuration.
        if (! in_array($name, ['api', 'app'])) {
            return parent::generateRouteByName($name, $default);
        }

        return $this->app->make(RouteGenerator::class, [
            $prefix,
            $this->app->make('request'),
            config($name === 'api' ? 'app.api' : 'app.url'),
        ]);
    }
}
