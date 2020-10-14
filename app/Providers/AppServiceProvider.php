<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        Blade::if('superadmin', function () {
            return auth()->check() && auth()->user()->role_id == 1;
        });
        Blade::if('admin', function () {
            return auth()->check() && (auth()->user()->role_id == 2 ||auth()->user()->role_id == 1);
        });
    }
}
