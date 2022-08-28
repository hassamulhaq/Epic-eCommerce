<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class SidebarMenuViewComposer
{

    public function compose(View $view)
    {
        $dashboardMenu = \App\Models\Menu::where([
            'id' => \App\Helpers\Constant::BACKEND_MENU['dashboard'], // comes from migration. on dashboard, we can only show the one menu.
            'parent_id' => null,
            'child_id' => null,
            'menu_type' => \App\Helpers\Constant::MENU_TYPE['menu']
        ])
            ->with('submenu.childRoutes')
            ->first();

        $view->with('dashboardMenu', $dashboardMenu);
    }
}
