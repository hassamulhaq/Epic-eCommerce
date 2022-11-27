<?php

namespace App\Traits;

use App\Models\Cart;

trait CartTrait
{
    use UserHelperTrait;

    public function cart($user_id):  Cart|null
    {
        if (!isset($user_id)) $user_id = $this->getUserId();

        $cart = Cart::with('CartItemsWithProduct')
            ->whereUserId($user_id)
            ->whereIsActive(true)
            ->whereIsGuest(is_null($user_id))
            ->first();

        if (is_null($cart)) {
            $cart = null;
        }

        return $cart;
    }
}
