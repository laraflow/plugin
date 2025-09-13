<?php

namespace Laraflow\Plugin\Providers;

use Illuminate\Support\ServiceProvider;
use Laraflow\Plugin\Plugin;

class PluginAutoloader extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        foreach (Plugin::getInstance()->getClasses() as $class) {
            $this->app->register($class);
        }
    }
}
