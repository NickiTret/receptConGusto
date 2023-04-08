<?php

namespace App\Providers;

use App\Models\Header;
use App\Models\Category;
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
         view()->composer(['Main.footer','Main.header'], function($view) {
            $view->with('headers', Header::all());
            $view->with('categories_menu', Category::orderBy('title')->get());
         });
    }
}
