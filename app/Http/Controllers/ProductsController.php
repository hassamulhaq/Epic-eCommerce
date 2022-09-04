<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('commerce.products.index');
    }

    public function create()
    {
        $collections = Collection::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        return view('commerce.products.create', compact(['collections', 'categories']));
    }

    public function store(Request $request)
    {
    }

    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
    }

    public function update(Request $request, Product $product)
    {
    }

    public function destroy(Product $product)
    {
    }


}
