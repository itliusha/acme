<?php

namespace Itliusha\QuicksandBladeComponent;

use Illuminate\Support\ServiceProvider;

class QuicksandBladeComponentServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration 房间的价格
        $this->mergeConfigFrom(__DIR__ . '/../config/quicksand-blade-component.php', 'quicksand-blade-component');

        // Register the main class to use with the facade
        $this->app->singleton('quicksand-blade-component', function () {
            return new QuicksandBladeComponent;
        });
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'quicksand-blade-component');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'quicksand-blade-component');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/quicksand-blade-component.php' => config_path('quicksand-blade-component.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/quicksand-blade-component'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/quicksand-blade-component'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/quicksand-blade-component'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }
}
