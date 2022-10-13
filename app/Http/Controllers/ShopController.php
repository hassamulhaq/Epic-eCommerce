<?php

namespace App\Http\Controllers;

use App\Helpers\ProductHelper;
use App\Models\Product;
use App\Models\ProductFlat;

class ShopController extends Controller
{
    public function index()
    {

        $products = Product::select(['id', 'sku'])
            ->whereHas('publishedProductFlat')
            ->with('categories', 'publishedProductFlat')
            ->paginate(18);
        return view('frontend.shop.index', compact('products'));
    }
}
