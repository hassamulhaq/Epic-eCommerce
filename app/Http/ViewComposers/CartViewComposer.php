<?php

namespace App\Http\ViewComposers;

use App\Models\Cart;
use Illuminate\View\View;

class CartViewComposer
{
    public function compose(View $view): void
    {
        if (auth()->check()) {
            $cartItems = Cart::with('CartItemsWithProduct')->whereUserId(auth()->id())->first();
        } elseif (auth()->guest()) {
            $cartItems = Cart::with('CartItemsWithProduct')->whereNull('user_id')->first();
        } else $cartItems = null;

        $view->with('cartItems', $cartItems);
    }
}
