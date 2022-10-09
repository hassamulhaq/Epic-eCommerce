<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Media extends Model
{

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
}
