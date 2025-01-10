<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Companies;
use App\Observers\CompanyObserver;

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
        Companies::observe(CompanyObserver::class);
    }
}
