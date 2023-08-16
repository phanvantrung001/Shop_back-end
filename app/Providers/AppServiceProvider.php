<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;


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
        Schema::defaultStringLength(191);


        View::composer('*', function ($view) {
            $cart = \Session::get('cart');
            $cart_total = 0;
            if (isset($cart) && is_array($cart)) {
                $cart_total = count($cart);
            }
            $ss_cart = [
                'cart' => $cart,
                'cart_total' => $cart_total,
            ];
            $view->with('ss_cart', $ss_cart);
        });
    }
}
