<?php

namespace App\Traits;

use App\Models\Cart;

trait CartTrait
{
    use UserHelperTrait;

    public function cart($user_id): Cart
    {
        if (!isset($user_id)) $user_id = $this->getUserId();

        return Cart::with('CartItemsWithProduct')
            ->whereUserId($user_id)
            ->whereIsActive(true)
            ->whereIsGuest(is_null($user_id))
            ->first();
    }
}
