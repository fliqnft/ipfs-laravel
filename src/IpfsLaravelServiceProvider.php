<?php

namespace Fliq\IpfsLaravel;

use Illuminate\Support\ServiceProvider;

class IpfsLaravelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'fliq');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'fliq');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ipfs-laravel.php', 'ipfs-laravel');

        // Register the service the package provides.
        $this->app->singleton('ipfs-laravel', function ($app) {
            return new IpfsLaravel;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ipfs-laravel'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/ipfs-laravel.php' => config_path('ipfs-laravel.php'),
        ], 'ipfs-laravel.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/fliq'),
        ], 'ipfs-laravel.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/fliq'),
        ], 'ipfs-laravel.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/fliq'),
        ], 'ipfs-laravel.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
