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
    protected array $response = [];

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

    /**
     * @throws \Throwable
     */
    public function addToCart(AddToCartRequest $request) {
        $productFlat = ProductFlat::whereUuid($request->input('product_uuid'))->first();

        $userId = (auth()->guest()) ? UserHelper::ROLE_GUEST :  auth()->id();

        \DB::beginTransaction();
        try {
            $cart = Cart::updateOrCreate([
                'user_id' => $userId
            ], [
                    'user_id' => $userId
                ]
            );

            ($cart->wasRecentlyCreated) ? $cart->update(['items_count' => 1]) : $cart->increment('items_count');

            $cart->cartItems()->create([
                'product_id' => $productFlat->product_id, // product, product_flat:product_id both are same and hasOne relation
                'quantity' => $request->input('quantity'),
            ]);

            \DB::commit();
            $this->response = [
                'success' => true,
                'status_code' => 201,
                'reload' => false,
                'message' => __('cart.product_added_to_cart'),
                'data' => []
            ];

        } catch (\Exception $e) {
            \DB::rollback();
            $this->response = [
                'success' => false,
                'status' => 'error',
                'status_code' => $e->getCode(),
                'type' => 'try_catch exception',
                'message' => 'Something went wrong!',
                'data' => ['message' => $e->getMessage()]
            ];
        }

        return response()->json($this->response);
    }
}
