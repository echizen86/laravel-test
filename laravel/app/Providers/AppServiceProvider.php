<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth0\Login\Contract\Auth0UserRepository as Auth0Contract;
use App\Repositories\CustomUserRepository as UserRepo;
use Queue;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		// something dave did for stats	    
        Queue::after(function ($connection, $job, $data) {
            dump('hiii');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /* Development Env Providers */
        /*if ($this->app->environment() === 'local') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }*/

        $this->app->bind(
            Auth0Contract::class,
            UserRepo::class
        );
    }
}
