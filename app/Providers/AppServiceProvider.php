<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // c1
        view()->composer('header', function($view) {
            $typeProduct = ProductType::all();
            $view->with('typeProduct', $typeProduct);
        });

        // c2
        // $typeProduct = ProductType::all();
        // view()->share('typeProduct', $typeProduct);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
