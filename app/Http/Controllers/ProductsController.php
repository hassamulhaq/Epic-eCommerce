<?php

namespace App\Http\Controllers;


use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{



    public function __construct(protected ProductService $productService)
    {
    }

    public function index()
    {
        $products = Product::with('categories')->paginate(25);
        return view('commerce.products.index', compact(['products']));
    }

    public function create()
    {
        $collections = Collection::all(['id', 'title']);
        $categories = Category::all(['id', 'title']);
        return view('commerce.products.create', compact(['collections', 'categories']));
    }

    /**
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $response = $this->productService->store($request);
        return \response()->json($response);
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
        $product->delete();
        $response = ['success' => 'Record Deleted'];

        return redirect()->route('admin.products.index')->with($response);
    }


    public function uniqueSlug(Request $request)
    {
        return SlugService::createSlug(Product::class, 'slug', $request->input('title'), ['unique' => true]);
    }

}
