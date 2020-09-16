<?php

namespace App\Providers;

use App\Services\Digiflazz\Buyer\DigiflazzBuyer;
use Carbon\Carbon;
use DebugBar\DebugBar;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        \Debugbar::disable();

        Inertia::setRootView('layouts.dashboard');
    }
}
