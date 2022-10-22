<?php

namespace App\Interfaces;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductFlat;

interface CartServiceInterface
{
    public function findProductByUuid(string $uuid): ProductFlat;

    public function findCartItemByCardIdAndProductId(int $cartId, int $productId): CartItem;

    public function findCartItemByCardId(int $cartId): CartItem;

    public function store(array $request);

    public function newCart(ProductFlat $productFlat, array $request);

    public function updateCart(Cart $cart, ProductFlat $productFlat, array $request);

    public function createCartItem(Cart $cart, ProductFlat $productFlat, array $request): \Illuminate\Database\Eloquent\Model|CartItem;

    // don't remove
    //public function updateCartItem(Cart $cart, CartItem $cartItem, ProductFlat $productFlat, array $request): bool;

    public function updateCartAfterInsertingCartItems(Cart $cart, CartItem $cartItem): bool;

    public function calculateIncludeVAT(float $vat_percentage, float $amount): float|int;

    public function calculateExcludeVAT(float $vat_percentage, float $amount): float|int;

    public function taxAmountIncludedVAT($vat_percentage, $amount): float;

}
