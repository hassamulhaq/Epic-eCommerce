<?php

namespace App\Listeners;

use App\Events\CartCreatedEvent;

class CartCreatedEventListener
{
    public function __construct()
    {
    }

    public function handle(CartCreatedEvent $event): void
    {

    }
}
