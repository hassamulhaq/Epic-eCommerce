<?php

namespace App\Models;

use App\Helpers\Constant;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $child_id
 * @property int $menu_type 1=menu, 2=route
 * @property string $title
 * @property string|null $route
 * @property string|null $route_name
 * @property int $icon_type 0 none, 1 svg, 2 image
 * @property string|null $icon
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Menu[] $childRoutes
 * @property-read int|null $child_routes_count
 * @property-read Menu|null $parentMenu
 * @property-read \Illuminate\Database\Eloquent\Collection|Menu[] $submenu
 * @property-read int|null $submenu_count
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereChildId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIconType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMenuType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereRouteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

//    public function menuChildRoutes(): \Illuminate\Database\Eloquent\Relations\HasMany
//    {
//        return $this->hasMany(Menu::class, 'child_id', 'id');
//    }

    // get child routes of a route if any
    public function childRoutes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Menu::class, 'child_id', 'id');
    }

    // get parent of a child route
    public function parentMenu(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Menu::class, 'child_id');
    }

//    public function menuChildRoutes()
//    {
//        return $this->hasManyThrough(Menu::class, Menu::class, 'parent_id', 'child_id', 'oooo', 'id');
//    }
}
