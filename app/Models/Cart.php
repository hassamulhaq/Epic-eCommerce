<?php

namespace App\Models;

use App\Helpers\UserHelper;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'items_count',
        'is_guest',
        'is_active',
        'cart_currency_code',
        'grand_total',
        'base_grand_total',
        'sub_total',
        'base_sub_total',
        'tax_total',
        'base_tax_total',
        'discount_amount',
        'base_discount_amount',
        'conversion_time'
    ];

    protected $casts = [
        //'user_id' => UserHelper::ROLE_GUEST // default user_id in-case of guest checkout
    ];


//    protected static function boot()
//    {
//        parent::boot();
//
//        self::creating( function ($model) {
//            if (empty($model->uuid)) {
//                $model->uuid = Uuid::uuid4()->toString();
//            }
//        });
//    }

    public function cartItems(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    public function CartItemsWithProduct(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->cartItems()->with('product.productFlat');
    }

    public function CartDistinctItemsWithProduct(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->cartItems()

            ->with('product.productFlat');
    }
}
