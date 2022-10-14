<?php

namespace App\Listeners;

use App\Events\ProductCreatedEvent;
use Mail;

class ProductCreatedEventListener
{
    public function __construct()
    {
    }

    public function handle(ProductCreatedEvent $event): void
    {
        Mail::send('emails.products.created', (array) $event, function ($message) {
            $message->to(auth()->user()->email);
            $message->subject("New Product Created");
        });

    }
}
