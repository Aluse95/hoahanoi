<?php

namespace App\Providers;

use App\Models\Cat;
use App\View\Components\Alert;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
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
        $cats = Cat::where('status',1)->take(4)->get();

        if($cats->count() > 0) {

            View::share('cats', $cats);
        }

        Blade::component('alert', Alert::class);

        Paginator::useBootstrapFour();
    }
}
