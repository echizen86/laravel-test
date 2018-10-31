<?php

namespace FastPBX\ProfileHubSync;

use Illuminate\Support\ServiceProvider;

class ProfileHubSyncProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        $this->publishes([
            __DIR__.'/../../config/profilehubsync.php' => config_path('profilehubsync.php'),
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\Commands\SyncProfiles::class,
            ]);
        }

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
