<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {

    }


    public function addOrRemove(Request $request, Product $product)
    {
        dd($product->id);
    }

    public function moveToCart(Request $request, Product $product)
    {
        dd($product);
    }
}
