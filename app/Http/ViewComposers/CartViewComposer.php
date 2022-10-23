<?php

namespace App\Http\ViewComposers;

use App\Models\Cart;
use Illuminate\View\View;
use App\Traits\UserHelperTrait;

class CartViewComposer
{
    use UserHelperTrait;

    public function compose(View $view): void
    {
        $userId = $this->getUserId();
        $cartItems = Cart::with('CartItemsWithProduct')
            ->whereUserId($userId)
            ->whereIsActive(true)
            ->whereIsGuest(is_null($userId))
            ->first();

        $view->with('cartItems', $cartItems);
    }
}
