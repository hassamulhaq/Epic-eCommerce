<?php

namespace App\Models;

use App\Helpers\Constant;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = ['parent_id', 'child_id', 'menu_type', 'title', 'route', 'route_name', 'icon_type', 'icon'];

    //protected $casts = ['menu_type' => Constant::MENU_TYPE];


//    public function submenu(): \Illuminate\Database\Eloquent\Relations\BelongsTo
//    {
//        return $this->belongsTo(Menu::class, 'parent_id');
//    }

    public function submenu(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
