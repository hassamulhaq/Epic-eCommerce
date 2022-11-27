<?php

namespace App\Http\Services;

use App\Helpers\CartHelper;
use App\Helpers\VAT_Helper;
use App\Interfaces\CartServiceInterface;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductFlat;
use App\Traits\VAT_Trait;
use App\Traits\UserHelperTrait;

class CartService implements CartServiceInterface
{
    use VAT_Trait, UserHelperTrait;

    protected array $response = [];

    public function __construct()
    {

    }

    public function findProductByUuid($uuid): ProductFlat
    {
        return ProductFlat::whereUuid($uuid)->first();
    }

    public function findCartItemByCardIdAndProductId($cartId, $productId): CartItem
    {
        return CartItem::whereCartId($cartId)->whereProductId($productId)->firstOrFail();
    }

    public function findCartItemByCardId($cartId): CartItem
    {
        return CartItem::whereCartId($cartId)->firstOrFail();
    }

    /**
     * @throws \Throwable
     */
    public function store($request): array
    {
        $productFlat = $this->findProductByUuid($request['product_uuid']);

        \DB::beginTransaction();
        try {
            $cartObj = Cart::where(['user_id' => $this->getUserId(), 'is_guest' => is_null($this->getUserId()), 'is_active' => true])->first();

            // new cart
            if( ! is_object($cartObj )) $res = $this->newCart($productFlat, $request);

            // update existing cart
            if ( is_object($cartObj) ) $res = $this->updateCart($cartObj, $productFlat, $request);

            \DB::commit();

            $res['reload'] = true;
            $res['status_code'] = 201;
            $this->response = $res;

        } catch (\Exception $e) {
            \DB::rollback();
            $this->response = [
                'success' => false,
                'status_code' => $e->getCode(),
                'reload' => false,
                'type' => 'try_catch exception',
                'message' => 'Something went wrong!',
                'data' => ['message' => $e->getMessage()]
            ];
        }

        return $this->response;
    }


    public function newCart(ProductFlat $productFlat, $request): array
    {
        $cart = Cart::create([
            'user_id' => $this->getUserId(),
            'is_guest' => is_null($this->getUserId()), // guest=null
            'is_active' => true,
            'cart_currency_code' => CartHelper::DEFAULT_CART_CURRENCY_CODE,
            'conversion_time' => now()
        ]);
        if (! is_object($cart) ) return ['success' => false, 'message' => 'Error! Cart not created', 'data' => ['function newCart()']];

        // entry in cart_items
        $newCartItem = $this->createCartItem($cart, $productFlat, $request);

        // update cart after entry in cart_items
        $is_updated = $this->updateCartAfterInsertingCartItems($cart, $newCartItem);
        if (! $is_updated ) return ['success' => false, 'message' => 'Error! Cart not updated after adding cart item', 'data' => ['function newCart()']];

        return $this->response = [
            'success' => true,
            'message' => __('cart.product_added_to_cart'),
            'data' => ["Item ({$productFlat->title}) is added to cart!"]
        ];
    }


    public function updateCart(Cart $cart, ProductFlat $productFlat, $request): array
    {
        //$cartItem = $this->findCartItemByCardIdAndProductId($cart->id, $productFlat->id);

        $newCartItem = $this->createCartItem($cart, $productFlat, $request);

        // update cart after entry in cart_items
        $is_updated = $this->updateCartAfterInsertingCartItems($cart, $newCartItem);
        if (! $is_updated ) return ['success' => false, 'message' => 'Error! Cart not updated after adding cart item', 'data' => ['function updateCart()']];

        /*
         * enable below code if you want to update same cart_item if cart_id, product_id both same.
         * then also update updateCartAfterInsertingCartItems() function
         * */
        // if same product not exists then create new one
//        if ( ! is_object($cartItem) ) {
//            $newCartItem = $this->createCartItem($cart, $productFlat, $request);
//
//            // update cart after entry in cart_items
//            $this->updateCartAfterInsertingCartItems($cart, $newCartItem);
//        } else {
//            $this->updateCartItem($cart, $cartItem, $productFlat, $request);
//
//            // update main cart after entry in cart_items
//            $this->updateCartAfterInsertingCartItems($cart, $cartItem);
//        }

        return $this->response = [
            'success' => true,
            'message' => __('cart.product_added_to_cart'),
            'data' => ["Item {$productFlat->title} is added to cart!", "Cart updated"]
        ];
    }


    public function updateCartAfterInsertingCartItems(Cart $cart, CartItem $cartItem): bool
    {
        $cartItem = $this->findCartItemByCardId($cart->id);

        return $cart->update([
            'items_count' => $cartItem->count(),
            'grand_total' => $cartItem->sum('total') - $cartItem->discount_amount,
            'base_grand_total' => $cartItem->sum('base_total'),
            'sub_total' => $cartItem->sum('total'),
            'base_sub_total' => $cartItem->sum('base_total'),
            'tax_total' => $cartItem->sum('tax_amount') - $cartItem->discount_amount,
            'base_tax_total' => $cartItem->sum('tax_amount'),
            'discount_amount' => 0,
            'base_discount_amount' => 0,
            'conversion_time' => now()
        ]);
    }

    public function createCartItem(Cart $cart, ProductFlat $productFlat, array $request): \Illuminate\Database\Eloquent\Model|CartItem
    {
        return $cart->cartItems()->create([
            'product_id' => (int) $productFlat->product_id,
            'quantity' => (int) $request['quantity'],
            'sku' => (string) $productFlat->sku,
            'weight' => (float) $productFlat->weight,
            'total_weight' => (float) $productFlat->weight * $request['quantity'],
            'item_count' => (int) 1, // on create item_count is 1, on update value may be different
            //'price' => (float) $this->calcAddVatToAmount($productFlat->price, VAT_Helper::VAT_PERCENTAGE),
            'price' => (float) $productFlat->price,
            'base_price' => (float) $productFlat->price,
            'total' => (float) $this->calcAddVatToAmount($productFlat->price * $request['quantity'], VAT_Helper::VAT_PERCENTAGE),
            'base_total' => (float) $productFlat->price * $request['quantity'],
            'tax_percent' => VAT_Helper::VAT_PERCENTAGE,
            'tax_amount' => $this->calcVatAddedValue($productFlat->price * $request['quantity'], VAT_Helper::VAT_PERCENTAGE),
            'discount_percent' => 0,
            'discount_amount' => 0
        ]);
    }

// don't remove
//    public function updateCartItem(Cart $cart, CartItem $cartItem, ProductFlat $productFlat, array $request): bool
//    {
//        return $cart->cartItems()->update([
//            'quantity' => (int) $cartItem->quantity + $request['quantity'],
//            'weight' => (float) $productFlat->weight,
//            'total_weight' => (float) $cartItem->weight + ($productFlat->weight * $request['quantity']),
//            'item_count' => (int) $cartItem->item_count + 1, // on create item_count is 1, on update value may be different
//            'price' => (float) $productFlat->price, // both okay if we remove price, base_price from here
//            'base_price' => (float) $productFlat->price,
//            'total' => (float) $cartItem->total + ($productFlat->price * $request['quantity']),
//            'base_total' => (float) $cartItem->base_total + ($productFlat->price * $request['quantity']),
//            'tax_percent' => CartHelper::VAT_PERCENTAGE,
//            'tax_amount' => CartHelper::VAT_AMOUNT,
//            'discount_percent' => 0,
//            'discount_amount' => 0
//        ]);
//    }


}

// [https://github.com/hassamulhaq @devhassam]
