<?php

namespace App\Http\Services;

use App\Helpers\CartHelper;
use App\Helpers\UserHelper;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductFlat;

class CartService
{

    protected array $response = [];

    protected string|int|null $userId;

    public function __construct()
    {
        $this->userId = (auth()->guest()) ? UserHelper::ROLE_GUEST :  auth()->id();
    }

    /**
     * @throws \Throwable
     */
    public function store($request): array
    {
        $productFlat = ProductFlat::whereUuid($request['product_uuid'])->first();

        \DB::beginTransaction();
        try {
            $isItemAlreadyInCart = Cart::where(['user_id' => $this->userId])->first();

            // new cart
            if( ! is_object($isItemAlreadyInCart )) $this->newCart($productFlat, $request);

            // update existing cart
            if ( is_object($isItemAlreadyInCart) ) $this->updateCart($productFlat, $request);

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
                'success' => false,
                'status_code' => $e->getCode(),
                'type' => 'try_catch exception',
                'message' => 'Something went wrong!',
                'data' => ['message' => $e->getMessage()]
            ];
        }

        return $this->response;
    }



    private function newCart(ProductFlat $productFlat, $request): void
    {
        $cart = Cart::create([
            'user_id' => $this->userId,
            'is_guest' => is_null($this->userId), // guest=null
            'is_active' => true,
            'cart_currency_code' => CartHelper::DEFAULT_CART_CURRENCY_CODE,
            'conversion_time' => now()
        ]);

        // entry in cart_items
        $cartItem = $cart->cartItems()->create([
            'product_id' => $productFlat->product_id,
            'quantity' => $request['quantity'],
            'sku' => $productFlat->sku,
            'weight' => $productFlat->weight,
            'total_weight' => $productFlat->weight * $request['quantity'],
            'item_count' => 1, // on create item_count is 1, on update value may be different
            'price' => $productFlat->price,
            'base_price' => $productFlat->price,
            'total' => $productFlat->price * $request['quantity'],
            'base_total' => $productFlat->price * $request['quantity'],
            'tax_percent' => 0,
            'tax_amount' => 0,
            'discount_percent' => 0,
            'discount_amount' => 0,
        ]);

        // update main cart after entry in cart_items
        $cart->update([
            'items_count' => $cart->increment('items_count'),
            'grand_total' => $cart->grand_total + $cartItem->total,
            'base_grand_total' => $cart->grand_total + $cartItem->base_total,
            'sub_total' => $cart->grand_total + $cartItem->total,
            'base_sub_total' => $cart->grand_total + $cartItem->base_total,
            'tax_total' => 0,
            'base_tax_total' => 0,
            'discount_amount' => 0,
            'base_discount_amount' => 0,
            'conversion_time' => now()
        ]);
    }


    private function updateCart(ProductFlat $productFlat, $request): void
    {
        $cart = Cart::where(['user_id' => $this->userId, 'is_guest' => is_null($this->userId), 'is_active' => true])->first();
        $cartItemObj = CartItem::whereCartId($cart->id)
            ->whereProductId($productFlat->id)->first();

        // if same product not exists then create new one
        if( ! is_object($cartItemObj) ) {
            $cartItem = $cart->cartItems()->create([
                'product_id' => $productFlat->product_id,
                'quantity' => $request['quantity'],
                'sku' => $productFlat->sku,
                'weight' => $productFlat->weight,
                'total_weight' => $productFlat->weight * $request['quantity'],
                'item_count' => 1, // on create item_count is 1, on update value may be different
                'price' => $productFlat->price,
                'base_price' => $productFlat->price,
                'total' => $productFlat->price * $request['quantity'],
                'base_total' => $productFlat->price * $request['quantity'],
                'tax_percent' => 0,
                'tax_amount' => 0,
                'discount_percent' => 0,
                'discount_amount' => 0,
            ]);

            #todo start here, item_count not add
            $cart->update([
                'items_count' => $cart->increment('items_count', $cart->cartItems()->count()),
                'grand_total' => $cart->grand_total + $cartItem->total,
                'base_grand_total' => $cart->grand_total + $cartItem->base_total,
                'sub_total' => $cart->grand_total + $cartItem->total,
                'base_sub_total' => $cart->grand_total + $cartItem->base_total,
                'tax_total' => 0,
                'base_tax_total' => 0,
                'discount_amount' => 0,
                'base_discount_amount' => 0,
                'conversion_time' => now()
            ]);
        }

        // if same product exists then update its attributes [https://github.com/hassamulhaq @devhassam]
        if ( is_object($cartItemObj) ) {
            $cart->cartItems()->update([
                'quantity' => $cartItemObj->increment('quantity', $request['quantity']),
                'weight' => $productFlat->weight,
                'total_weight' => $cartItemObj->weight + ($productFlat->weight * $request['quantity']),
                'item_count' => $cartItemObj->increment('item_count'), // on create item_count is 1, on update value may be different
                'price' => $productFlat->price, // both okay if we remove price, base_price from here
                'base_price' => $productFlat->price,
                'total' => $cartItemObj->price + ($productFlat->price * $request['quantity']),
                'base_total' => $cartItemObj->price + ($productFlat->price * $request['quantity']),
                'tax_percent' => 0,
                'tax_amount' => 0,
                'discount_percent' => 0,
                'discount_amount' => 0
            ]);

            // update main cart after entry in cart_items
            //$cartItem = CartItem::where(['cart_id' => $cart->id, 'product_id' => $productFlat->id])->first();
            $cart->update([
                'items_count' => $cart->increment('items_count', $cart->cartItems()->count()),
                'grand_total' => $cart->grand_total + $cartItemObj->total,
                'base_grand_total' => $cart->grand_total + $cartItemObj->base_total,
                'sub_total' => $cart->grand_total + $cartItemObj->total,
                'base_sub_total' => $cart->grand_total + $cartItemObj->base_total,
                'tax_total' => 0,
                'base_tax_total' => 0,
                'discount_amount' => 0,
                'base_discount_amount' => 0,
                'conversion_time' => now()
            ]);
        }

    }

}
