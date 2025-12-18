<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cart_count = 0;
            if (Session::has('user_id')) {
                $cart_count = Cart::where('user_id', Session::get('user_id'))->sum('quantity');
            }
            $view->with('cart_count', $cart_count);
        });
    }
}