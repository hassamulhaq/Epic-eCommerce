<?php

namespace App\Traits;

use App\Models\Cart;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

trait CartTrait
{
    use UserHelperTrait;

    /**
     * @return Cart|null
     */
    protected function getActiveCart(): Cart|null
    {
        $cartHash = $this->getCartMetaData()['cart_hash'];

        return Cart::whereUserId($this->getUserId())
            ->whereIsGuest(is_null($this->getUserId()))
            ->whereIsActive(true)
            ->whereCartHash($cartHash)
            ->whereNull('deleted_at')
            ->first();
    }

    /**
     * getActiveCart() and getActiveCartItems() both
     * return same cart. only difference is when we require cart object
     * we call getActiveCart() and if we require cart with cart_items then we
     * call getActiveCartItems() function.
     *
     * @return Collection
     */
    protected function getActiveCartItems(): \Illuminate\Support\Collection
    {
        $userId = $this->getUserId();
        $cartHash = $this->getCartMetaData()['cart_hash'];

        return DB::table('cart')
            ->selectRaw('cart_items.product_id,
                SUM(cart_items.quantity) AS item_quantity,
                SUM(cart_items.total_weight) AS item_total_weight,
                COUNT(cart_items.item_count) AS item_count,
                SUM(cart_items.price) AS item_price,
                SUM(cart_items.base_price) AS item_base_price,
                SUM(cart_items.total) AS item_total,
                SUM(cart_items.base_total) AS item_base_total,
                SUM(cart_items.tax_percent) AS item_tax_percent,
                SUM(cart_items.tax_amount) AS item_tax_amount,
                SUM(cart_items.discount_percent) AS item_discount_percent,
                SUM(cart_items.discount_amount) AS item_discount_amount,
                product_flat.uuid as product_uuid,
                product_flat.title as product_title,
                product_flat.slug as product_slug,
                product_flat.sku as product_sku')
            ->join('cart_items', 'cart.id', '=', 'cart_items.cart_id', 'inner')
            ->join('products', 'products.id', '=', 'cart_items.product_id', 'inner')
            ->join('product_flat', 'product_flat.product_id', '=', 'cart_items.product_id', 'inner')
            ->where('cart.user_id', '=', $userId)
            ->where('cart.is_active', '=', true)
            ->where('cart.is_guest', '=', is_null($userId))
            ->where('deleted_at', '=', null)
            ->where('cart_hash', '=', $cartHash)
            ->groupBy('cart_items.product_id')
            ->get();
    }



    protected function makeFreshCartSession(): void
    {
        if (! \Session::has('cart'))
            \Session::put('cart');
    }


    /**
     * @return mixed
     * @licence [https://github.com/hassamulhaq devhassam hassam.dev]
     */
    private static function prepareCartMetadata(): mixed
    {
        /*
         * add new keys in metadata, if you require.
         * and those will available in session.
         * also, make sure if you push any data in cart session then also create key-value pair with $metadata.
         * */
        $metadata = new \stdClass();
        $metadata->id = null;
        $metadata->cart_hash = null;

        if (! \Session::has('cart'))
            \Session::put('cart');


        /*
         * if session cart.* any key not exists,
         * then cart.* return null for that not exists key/index
         * */
        $metadata->id = \Session::get('cart.id');
        $metadata->cart_hash = \Session::get('cart.cart_hash');

        return json_decode(json_encode($metadata), true);
    }

    /**
     * @return mixed
     */
    protected function getCartMetaData(): mixed
    {
        return self::prepareCartMetadata();
    }

}
