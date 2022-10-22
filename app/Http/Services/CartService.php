<?php

namespace App\Http\Services;

use App\Helpers\CartHelper;
use App\Helpers\UserHelper;
use App\Helpers\VAT_Helper;
use App\Interfaces\CartServiceInterface;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductFlat;
use App\Traits\VAT_Trait;

class CartService implements CartServiceInterface
{
    use VAT_Trait;

    protected array $response = [];

    protected string|int|null $userId;

    public function __construct()
    {
        $this->userId = (auth()->guest()) ? UserHelper::ROLE_GUEST :  auth()->id();
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
            $cartObj = Cart::where(['user_id' => $this->userId, 'is_guest' => is_null($this->userId), 'is_active' => true])->first();

            // new cart
            if( ! is_object($cartObj )) $this->newCart($productFlat, $request);

            // update existing cart
            if ( is_object($cartObj) ) $this->updateCart($cartObj, $productFlat, $request);

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


    public function newCart(ProductFlat $productFlat, $request): void
    {
        $cart = Cart::create([
            'user_id' => $this->userId,
            'is_guest' => is_null($this->userId), // guest=null
            'is_active' => true,
            'cart_currency_code' => CartHelper::DEFAULT_CART_CURRENCY_CODE,
            'conversion_time' => now()
        ]);

        // entry in cart_items
        $newCartItem = $this->createCartItem($cart, $productFlat, $request);

        // update cart after entry in cart_items
        $this->updateCartAfterInsertingCartItems($cart, $newCartItem);
    }


    public function updateCart(Cart $cart, ProductFlat $productFlat, $request): void
    {
        //$cartItem = $this->findCartItemByCardIdAndProductId($cart->id, $productFlat->id);

        $newCartItem = $this->createCartItem($cart, $productFlat, $request);

        // update cart after entry in cart_items
        $this->updateCartAfterInsertingCartItems($cart, $newCartItem);

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
            'price' => (float) $this->calcAddVatToAmount(VAT_Helper::VAT_PERCENTAGE, $productFlat->price),
            'base_price' => (float) $productFlat->price,
            'total' => (float) $this->calcAddVatToAmount(VAT_Helper::VAT_PERCENTAGE, $productFlat->price * $request['quantity']),
            'base_total' => (float) $productFlat->price * $request['quantity'],
            'tax_percent' => VAT_Helper::VAT_PERCENTAGE,
            'tax_amount' => $this->calcVatAddedValue(VAT_Helper::VAT_PERCENTAGE, $productFlat->price * $request['quantity']),
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
