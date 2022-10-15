<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreProductRequest;
use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductFlat;
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
        $products = Product::with(['categories', 'productFlat'])->paginate(25);
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
    public function store(StoreProductRequest $request)
    {
        $response = $this->productService->store($request->validated());
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
        return SlugService::createSlug(ProductFlat::class, 'slug', $request->input('title'), ['unique' => true]);
    }


    public function singleProduct(ProductFlat $product)
    {
        $product->load('categories');
        return view('frontend.shop.simple-product', compact(['product']));
    }

}
