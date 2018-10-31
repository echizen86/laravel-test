<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use FastPBX\ProfileHubSync\Nova\Synchronizer;

class NovaServiceProvider extends NovaApplicationServiceProvider
{

    /**
     * Register the application's Nova resources.
     *
     * @return void
     */
    protected function resources()
    {
        // !!!!! This Needs To Be Included For Nova To Load Any Local Resources
        Nova::resourcesIn(app_path('Nova'));

        Nova::resources([
            Synchronizer::class
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return $user->hasAccess;
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new Help,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \Infinety\Filemanager\FilemanagerTool(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
