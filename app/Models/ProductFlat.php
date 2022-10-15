<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductFlat extends Model implements HasMedia
{
    use Sluggable, HasFactory, InteractsWithMedia;

    protected $table = 'product_flat';

    protected $casts = [
        'published_at' => 'timestamp',
        'featured' => 'int',
        'new' => 'int',
        'sold_individual' => 'int',
        'status' => 'int'
    ];

    protected $fillable = [
        'product_id',
        'uuid',
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

    protected static function boot()
    {
        parent::boot();

        self::creating( function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Uuid::uuid4()->toString();
            }
        });
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id');
    }
}
