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

    // prevent to delete this category_id
    const UNCATEGORIZED_CATEGORY_ID = 1;

    // prevent to delete this collection_id
    const UNCATEGORIZED_COLLECTION_ID = 1;

    const POST_STATUS = [
        'draft' => 0,
        'published' => 1,
        'trashed' => 2
    ];


    const PLACEHOLDER_IMAGE = [
        'path' => 'images/system/placeholder_image.jpg',
        'alt' => 'placeholder'
    ];
}
