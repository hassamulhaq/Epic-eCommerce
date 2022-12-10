<?php

namespace App\Events;

use App\Models\Cart;
use Illuminate\Foundation\Events\Dispatchable;

class CartCreatedEvent
{
    use Dispatchable;

    public function __construct(public Cart $cart)
    {
    }
}
