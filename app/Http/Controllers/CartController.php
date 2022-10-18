<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Http\Requests\AddToCartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductFlat;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Cart $cart)
    {
    }

    public function edit(Cart $cart)
    {
    }

    public function update(Request $request, Cart $cart)
    {
    }

    public function destroy(Cart $cart)
    {
    }

    public function addToCart(AddToCartRequest $request) {
        $productFlat = ProductFlat::whereUuid($request->input('product_uuid'))->first();

        $userId = (auth()->guest()) ? UserHelper::ROLE_GUEST :  auth()->id();

        \DB::transaction( function () use ($userId, $productFlat, $request) {
            $cart = Cart::create([
                'user_id' => $userId
            ]);

            $cart->cartItems()->create([
                'product_id' => $productFlat->product_id, // product, product_flat:product_id both are same and hasOne relation
                'quantity' => $request->integer('quantity', 1),
            ]);
        });
    }
}
