<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        // for base lang path
		// laravel 9 valiation error msg not show so its use by aarif
		app()->useLangPath(base_path('lang'));
		// for bootstrap pagination
		Paginator::useBootstrap();

    }
}
