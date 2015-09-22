<?php

namespace Monii\Interop\Container\Laravel;

use Interop\Container\ContainerInterface;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bind the Interop Container to the Laravel proxy.
     */
    public function register()
    {
        $this->app->bind(ContainerInterface::class, function ($app) {
            return new LaravelContainer($app);
        }, true);
    }
}
