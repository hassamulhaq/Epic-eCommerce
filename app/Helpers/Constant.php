<?php

namespace App\Helpers;

class Constant
{
    const MENU_TYPE = [
        'menu' => 1,
        'route' => 2
    ];

    const BACKEND_MENU = [
        'dashboard' => 1
    ];

    const POST_STATUS = [
        'draft' => 0,
        'published' => 1,
        'trashed' => 2
    ];
}
