<?php

namespace Laraflow\Plugin;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laraflow\Plugin\Commands\InstallPluginCommand;
use Laraflow\Plugin\Providers\EventServiceProvider;
use Laraflow\Plugin\Providers\RepositoryServiceProvider;
use Laraflow\Plugin\Providers\RouteServiceProvider;

class PluginServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/plugin.php', 'laraflow.plugin'
        );

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'plugin');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'plugin');

        Blade::componentNamespace('Laraflow\\Plugin\\Views\\Components', 'plugin');

        $this->loadPublishOptions();

        $this->registerCommands();

    }

    private function loadPublishOptions()
    {
        // Package Configuration
        $this->publishes([
            __DIR__.'/../config/plugin.php' => config_path('laraflow/plugin.php'),
        ], 'plugin-config');

        // Package Translation
        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/plugin'),
        ], 'plugin-lang');

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

    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallPluginCommand::class,
            ]);
        }
    }
}
