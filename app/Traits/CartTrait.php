<?php

namespace App\Traits;

use App\Models\Cart;

trait CartTrait
{
    use UserHelperTrait;

    public function cart($user_id):  Cart|null
    {
        if (!isset($user_id)) $user_id = $this->getUserId();

        $cart = Cart::with('CartItemsWithProduct')
            ->whereUserId($user_id)
            ->whereIsActive(true)
            ->whereIsGuest(is_null($user_id))
            ->first();

        if (is_null($cart)) {
            $cart = null;
        }

        return $cart;
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
