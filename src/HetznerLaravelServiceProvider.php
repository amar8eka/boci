<?php

namespace Boci\HetznerLaravel;

use Illuminate\Support\ServiceProvider;

/**
 * Hetzner Laravel Service Provider
 *
 * This service provider registers the Hetzner Cloud API client with Laravel's
 * service container and handles configuration publishing.
 */
class HetznerLaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('hetzner-laravel.php'),
            ], 'config');
        }

        // Register the facade
        $this->app->alias(Client::class, 'hetzner');
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'hetzner-laravel');

        // Register the main client
        $this->app->singleton(Client::class, function () {
            return Client::factory()
                ->withApiKey(config('hetzner-laravel.token'))
                ->withBaseUri(config('hetzner-laravel.base_url', 'https://api.hetzner.cloud/v1'))
                ->make();
        });

        // Register alias for backward compatibility
        $this->app->alias(Client::class, 'hetzner.client');
    }
}
