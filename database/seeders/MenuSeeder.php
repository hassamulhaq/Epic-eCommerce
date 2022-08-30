<?php

namespace Database\Seeders;

use App\Helpers\Constant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        // Menu Name
        DB::table('menu')->insert([
            [
                'id' => 1,
                'parent_id' => null,
                'menu_type' => Constant::MENU_TYPE['menu'],
                'title' => 'Backend Menu',
            ]
        ]);

        // Routes
        DB::table('menu')->insert([
            [
                'id' => 2,
                'parent_id' => 1, // child of Backend-menu
                'child_id' => null,
                'menu_type' => Constant::MENU_TYPE['route'],
                'title' => 'Dashboard',
                'route' => 'dashboard',
                'route_name' => 'admin.dashboard',
                'icon_type' => 1,
                'icon' => '<svg class="ub so oi" viewBox="0 0 24 24"><path class="du gq" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path><path class="du g_" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path><path class="du gq" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"></path></svg>'
            ],
            [
                'id' => 3,
                'parent_id' => 1, // child of Backend-menu
                'child_id' => null,
                'menu_type' => Constant::MENU_TYPE['route'],
                'title' => 'Appearance',
                'route' => '#0',
                'route_name' => '#',
                'icon_type' => 1,
                'icon' => '<svg class="ub so oi" viewBox="0 0 24 24"><path class="du g_" d="M20 7a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 0120 7zM4 23a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 014 23z"></path><path class="du gq" d="M17 23a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 010-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1zM7 13a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 112 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"></path></svg>',
            ],
            [
                'id' => 4,
                'parent_id' => 1, // child of Backend-menu
                'child_id' => 3, // child of Appearance
                'menu_type' => Constant::MENU_TYPE['route'],
                'title' => 'Menu',
                'route' => '/admin/menu',
                'route_name' => 'menu.index',
                'icon_type' => 0,
                'icon' => '',
            ],
            [
                'id' => 5,
                'parent_id' => 1, // child of Backend-menu
                'child_id' => 3, // child of Appearance
                'menu_type' => Constant::MENU_TYPE['route'],
                'title' => 'Widgets',
                'route' => 'widgets',
                'route_name' => 'widget.index',
                'icon_type' => 0,
                'icon' => '',
            ],
            [
                'id' => 6,
                'parent_id' => 1,
                'child_id' => null, // null = no child
                'menu_type' => Constant::MENU_TYPE['route'],
                'title' => 'Catalog',
                'route' => null,
                'route_name' => null,
                'icon_type' => 1,
                'icon' => '<svg class="ub so oi" viewBox="0 0 24 24"><path class="du gq" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z"></path><path class="du gz" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z"></path><path class="du g_" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z"></path></svg>',
            ],
            [
                'id' => 7,
                'parent_id' => 1,
                'child_id' => 6, // null = no child
                'menu_type' => Constant::MENU_TYPE['route'],
                'title' => 'Products',
                'route' => 'products',
                'route_name' => 'products.index',
                'icon_type' => 0,
                'icon' => null,
            ],
            [
                'id' => 8,
                'parent_id' => 1,
                'child_id' => 6, // null = no child
                'menu_type' => Constant::MENU_TYPE['route'],
                'title' => 'Categories',
                'route' => 'categories',
                'route_name' => 'products.categories',
                'icon_type' => 0,
                'icon' => null,
            ],
            [
                'id' => 9,
                'parent_id' => 1,
                'child_id' => 6, // null = no child
                'menu_type' => Constant::MENU_TYPE['route'],
                'title' => 'Collections',
                'route' => 'collections',
                'route_name' => 'products.collections',
                'icon_type' => 0,
                'icon' => null,
            ],
        ]);
    }
}
