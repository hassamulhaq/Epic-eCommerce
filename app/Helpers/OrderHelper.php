<?php

namespace App\Helpers;

class OrderHelper
{
    const ORDER_STATUS = [
        'pending',
        'processing',
        'on-hold',
        'completed',
        'cancelled',
        'refunded',
        'failed ',
        'trash '
    ];

    const DEFAULT_ORDER_STATUS = 'pending';
}
