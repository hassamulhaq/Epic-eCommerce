<?php

namespace App\Http\ViewComposers;

use App\Traits\CartTrait;
use Illuminate\View\View;

class CartViewComposer
{
    use CartTrait;

    public function compose(View $view): void
    {
        $cartObject = [];
        $cartObject['cart'] = $this->getActiveCart();
        $cartObject['cartItems'] = $this->getActiveCartItems();

        $view->with('cartObject', $cartObject);
    }
}
