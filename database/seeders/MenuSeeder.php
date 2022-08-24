<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menu')->insert([
            [
                'id' => 1,
                'parent_id' => null,
                'menu_type' => 'route',
                'title' => 'Dashboard',
                'route' => 'dashboard',
                'route_name' => 'admin.dashboard',
                'icon_type' => 1,
                'icon' => '<svg class="ub so oi" viewBox="0 0 24 24"><path class="du gq" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path><path class="du g_" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path><path class="du gq" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"></path></svg>'
            ],
            [
                'id' => 2,
                'parent_id' => null,
                'menu_type' => 'route',
                'title' => 'Appearance',
                'route' => '#0',
                'route_name' => '#0',
                'icon_type' => 1,
                'icon' => '<svg class="ub so oi" viewBox="0 0 24 24"><path class="du g_" d="M20 7a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 0120 7zM4 23a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 014 23z"></path><path class="du gq" d="M17 23a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 010-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1zM7 13a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 112 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"></path></svg>',
            ],
            [
                'id' => 3,
                'parent_id' => 2,
                'menu_type' => 'route',
                'title' => 'Menu',
                'route' => 'menu',
                'route_name' => 'admin.menu',
                'icon_type' => 0,
                'icon' => '',
            ],
            [
                'id' => 4,
                'parent_id' => 2,
                'menu_type' => 'route',
                'title' => 'Widgets',
                'route' => 'widgets',
                'route_name' => 'admin.widgets',
                'icon_type' => 0,
                'icon' => '',
            ],

        ]);
    }
}
