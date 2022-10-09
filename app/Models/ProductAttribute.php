<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ProductAttribute extends Model
{

    protected $fillable = [
        'attribute',
        'value',
        'uuid'
    ];

    //protected $primaryKey = 'uuid';
    //protected $keyType = 'string';
    //public $incrementing = false;

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Uuid::uuid4()->toString();
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

}
