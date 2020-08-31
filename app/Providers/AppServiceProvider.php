<?php

namespace App\Providers;

use App\Models\Shop;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Cart;

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
    public function boot() {

        View::composer(['layouts.app', 'product.info'], function ($view) {
            $view->with([
                'cartCount' => Cart::getTotalQuantity(),
                'cartTotal' => Cart::getTotal(),
            ]);
        });

        View::share('shop', Shop::firstOrFail());
    }
}
