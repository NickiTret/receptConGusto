<?php

namespace App\Providers;

use App\Models\Header;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cookie;
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
        DB::listen(function($query) {
            // dump($query->sql);
        });

        // Model::preventLazyLoading(app()->isProduction());

        // View composer для передачи данных на каждой странице
        view()->composer(['Main.footer', 'Main.header'], function($view) {
            // Проверка наличия cookie acceptCookie
            $hasAcceptedCookies = Cookie::get('acceptCookie', false);

            // Передаем переменные в представления
            $view->with('headers', Header::all());
            $view->with('categories_menu', Category::orderBy('title')->get());
            $view->with('hasAcceptedCookies', $hasAcceptedCookies); // Передаем переменную в представления
        });
    }
}
