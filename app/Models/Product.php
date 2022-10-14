<?php

namespace App\Models;

use App\Helpers\ProductHelper;
use App\Interfaces\ProductInterface;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model implements ProductInterface
{
    use HasFactory;

    protected $casts = [
        'type' => 'string',
        'sku' => 'string'
    ];

    protected $fillable = [
        'type',
        'sku',
        'additional',
        'parent_id'
    ];


    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function collections(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'product_collection');
    }

    public function attributes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function thumbnail(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Product::class);
    }

    // used in factory
    public function productFlat(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ProductFlat::class, 'product_id');
    }

    public function publishedProductFlat(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->productFlat()->where('status', ProductHelper::PRODUCT_STATUS['published']);
    }
}
