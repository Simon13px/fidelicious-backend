<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\ISettingRepository','App\Repositories\SettingRepository');
        $this->app->bind('App\Repositories\IPictureRepository','App\Repositories\PictureRepository');
        $this->app->bind('App\Repositories\IVendeurRepository','App\Repositories\VendeurRepository');
        $this->app->bind('App\Repositories\IClientRepository','App\Repositories\ClientRepository');
        $this->app->bind('App\Repositories\IStatRepository','App\Repositories\StatRepository');
    }
}
