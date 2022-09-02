<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MeshulamServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Service\MeshulamServiceInterface', 'App\Service\MeshulamService');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
