<?php

namespace Laraflow\Plugin;

use Illuminate\Support\ServiceProvider;
use Laraflow\Plugin\Providers\EventServiceProvider;
use Laraflow\Plugin\Providers\RouteServiceProvider;

class PluginServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/plugin.php', 'laraflow.plugin'
        );

        $this->app->register(RouteServiceProvider::class);

        $this->app->register(EventServiceProvider::class);

        Plugin::getInstance();
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'plugin');

        $this->loadPublishOptions();
    }

    private function loadPublishOptions(): void
    {
        // Package Configuration
        $this->publishes([
            __DIR__.'/../config/plugin.php' => config_path('laraflow/plugin.php'),
        ], 'plugin-config');

        // Package Blade Views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laraflow/plugin'),
        ], 'plugin-views');

        // Package Public Assets
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/plugin'),
        ], 'plugin-assets');

        // Package Database Migrations
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'plugin-migrations');
    }
}
