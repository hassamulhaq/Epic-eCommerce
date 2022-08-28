<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('/layouts/dashboard');
    }

    public function compose() {
        return ['dashboardMenu' => $this->loadDashboardMenu()];
    }

    private function loadDashboardMenu() {
        return \App\Models\Menu::where([
            'id' => \App\Helpers\Constant::BACKEND_MENU['dashboard'], // comes from migration. on dashboard, we can only show the one menu.
            'parent_id' => null,
            'child_id' => null,
            'menu_type' => \App\Helpers\Constant::MENU_TYPE['menu']
        ])
            ->with('submenu.childRoutes')
            ->first();
    }

    public function preview() {
        return view('/layouts/dashboard_preview');
    }
}
