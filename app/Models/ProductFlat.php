<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFlat extends Model
{
    use Sluggable, HasFactory;

    protected $table = 'product_flat';

    protected $casts = [
        'published_at' => 'timestamp'
    ];

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'tags',
        'length',
        'width',
        'height',
        'weight',
        'sku',
        'mid_code',
        'product_number',
        'price',
        'regular_price',
        'cost',
        'special_price',
        'special_price_from',
        'special_price_to',
        'stock_quantity',
        'backorders',
        'low_stock_amount',
        'stock_status',
        'description',
        'featured',
        'new',
        'sold_individual',
        'status',
        'published_at'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
