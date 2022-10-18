<?php

namespace App\Providers;

use App\Http\ViewComposers\CartViewComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CartServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        View::composer('components.cart-icon-dropdown', CartViewComposer::class);
    }
}
