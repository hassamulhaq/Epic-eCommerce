<?php

namespace App\Helpers;

class ProductHelper
{
        // prevent to delete this category_id
    const UNCATEGORIZED_CATEGORY_ID = 1;
    const UNCATEGORIZED_CATEGORY_TITLE = 'Uncategorized';

    // prevent to delete this collection_id
    const UNCATEGORIZED_COLLECTION_ID = 1;

    const PRODUCT_STATUS = [
        'draft' => 0,
        'published' => 1,
        'trashed' => 2
    ];

    const PRODUCT_STOCK_STATUS = [
        'instock', 'outofstock', 'onbackorder'
    ];

//    const PRODUCT_STOCK_STATUS = [
//        'instock' => 'Instock',
//        'outofstock' => 'Out Of stock',
//        'onbackorder' => 'On Back Order'
//    ];

    const PRODUCT_BACKORDERS = [
        'no', 'notify', 'yes'
    ];


    /*
     * Don't change order.
     * just add new entry at very bottom
     * */
    const PRODUCT_TYPE = [
        'simple' => 1,
        'variable' => 2,
        'external' => 3,
        'grouped' => 4,
    ];


    const PLACEHOLDER_IMAGE = [
        'path' => 'images/system/placeholder_image.jpg',
        'alt' => 'placeholder'
    ];


    const IS_FEATURED = [
        'default' => 0,
        'true' => 1
    ];

    const IS_NEW = [
        'default' => 0,
        'true' => 1
    ];

    const IS_SOLD_INDIVIDUAL = [
        'default' => 0,
        'true' => 1
    ];
}
