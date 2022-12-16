<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'quantity',
        'sku',
        'weight',
        'total_weight',
        'item_count',
        'price',
        'base_price',
        'total',
        'base_total',
        'tax_percent',
        'tax_amount',
        'discount_percent',
        'discount_amount'
    ];


    public function product(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
