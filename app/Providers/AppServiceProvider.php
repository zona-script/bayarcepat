<?php

namespace App\Providers;

use App\Services\Digiflazz\Buyer\DigiflazzBuyer;
use DebugBar\DebugBar;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Digiflazz\Buyer\DigiflazzBuyer', function ($app) {
            return new DigiflazzBuyer();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Debugbar::disable();
        //
    }
}
