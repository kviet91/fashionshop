<?php

namespace App\Providers;

use App\Cart;
use App\Catalog;
use App\Product;
use Illuminate\Support\Facades\Session;
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
        view()->composer('header', function ($view) {
            $catalog = Catalog::all();
            $view->with('catalog', $catalog);
        });

        view()->composer('header', function ($view) {
            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'), 'product_cart' => $cart->items,
                    'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty
                ]);
            }

        });
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

