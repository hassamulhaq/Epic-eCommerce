<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {

        $products = Product::select(['id', 'title', 'slug', 'sku', 'price', 'regular_price'])
            ->whereStatus('1')
            ->with('categories')
            //->with('thumbnail')
            ->get();
        return view('frontend.shop.index', compact('products'));
    }
}
