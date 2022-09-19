<?php

namespace Fliq\IpfsLaravel;

use Illuminate\Support\ServiceProvider;

class IpfsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() : void
    {
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register() : void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ipfs.php', 'ipfs');

        $this->app->singleton('ipfs', function ($app) {
            return match (config('ipfs.facade_as')) {
                'api'     => new Ipfs(config('ipfs.api')),
                'gateway' => new IpfsGateway(config('ipfs.gateway')),
            };
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ipfs'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole() : void
    {
        $this->publishes([
            __DIR__ . '/../config/ipfs.php' => config_path('ipfs.php'),
        ], 'ipfs.config');
    }
}
