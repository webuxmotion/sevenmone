<?php

namespace App\Providers;

use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('languages')) {
            app()->macro('getLocaleId', function () {
                return DB::table('languages')
                    ->where('code', app()->getLocale())
                    ->value('id');
            });
        }

        View::composer('*', function ($view) {
            $cart = session('cart', ['quantity' => 0]);
            $view->with('cartCount', $cart['quantity'] ?? 0);

            $wishlistIds = Wishlist::get_wishlist_ids();
            View::share('wishlistIds', $wishlistIds);
        });
    }
}
