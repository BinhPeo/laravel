<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\like;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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

        view()->composer('*',function($view){
            $like=like::where('user_id',auth()->id())->get();
            $carts=Cart::where('user_id',auth()->id())->get();
            $view->with(compact('carts','like'));

        });
        Paginator::useBootstrap();
    }
}
