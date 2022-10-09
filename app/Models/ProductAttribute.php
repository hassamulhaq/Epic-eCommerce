<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{

    protected $fillable = [
        'attribute',
        'value'
    ];

    protected $keyType = 'string';
    public $incrementing = false;
}
