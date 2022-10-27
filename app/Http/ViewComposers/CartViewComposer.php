<?php

namespace App\Http\ViewComposers;

use App\Models\Cart;
use App\Traits\CartTrait;
use Illuminate\View\View;
use App\Traits\UserHelperTrait;

class CartViewComposer
{
    use UserHelperTrait, CartTrait;

    public function compose(View $view): void
    {
        $userId = $this->getUserId();
        $cart = $this->cart($userId);

        $view->with('cart', $cart);
    }
}
