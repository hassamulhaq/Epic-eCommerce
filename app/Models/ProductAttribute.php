<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ProductAttribute extends Model
{

    protected $fillable = [
        'attribute',
        'value'
    ];

}
