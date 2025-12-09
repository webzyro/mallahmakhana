<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\WishlistItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('components.navbar', function ($view) {
            $cartCount = Auth::check() ? Auth::user()->cartItems()->count() : count(session('cart', []));
            $wishlistCount = Auth::check() ? Auth::user()->wishlistItems()->count() : count(session('wishlist', []));

            $view->with(compact('cartCount', 'wishlistCount'));
        });

    }
}
