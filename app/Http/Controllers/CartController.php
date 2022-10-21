<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Http\Requests\AddToCartRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductFlat;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\False_;

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
                'user_id' => $userId,
                'is_guest' => is_null($userId),
                'is_active' => true,
                'cart_currency_code' => '$',
                'grand_total' => 0,
                'base_grand_total' => 0,
                'sub_total' => 0,
                'base_sub_total' => 0,
                'tax_total' => 0,
                'base_tax_total' => 0,
                'discount_amount' => 0,
                'base_discount_amount' => 0,
                'conversion_time' => now()
            ]);
            ($cart->wasRecentlyCreated) ? $cart->update(['items_count' => 1]) : $cart->increment('items_count');

            $cartItem = $cart->cartItems()->updateOrCreate([
                'product_id' => $productFlat->product_id,
                //'quantity' => $request->input('quantity'),
            ]);
            ($cartItem->wasRecentlyCreated) ? $cartItem->update(['quantity' => $request->input('quantity')]) : $cartItem->increment('quantity', $request->input('quantity'));

            \DB::commit();
            $this->response = [
                'success' => true,
                'status_code' => 201,
                'reload' => true,
                'message' => __('cart.product_added_to_cart'),
                'data' => []
            ];

        } catch (\Exception $e) {
            \DB::rollback();
            $this->response = [
                'success' => true,
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
