<?php

namespace App\Http\Controllers;

use App\Helpers\Constant;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $selected_menu = (int) $request->input('selected_menu');
        $onlyMenus = $this->getOnlyMenus();

        $selectedMenuRoutes = Menu::where([
            'parent_id' => $selected_menu,
            'menu_type' => Constant::MENU_TYPE['route']
        ])->get();


        return view('menu.index', ['onlyMenus' => $onlyMenus, 'selectedMenuRoutes' => $selectedMenuRoutes]);
    }

    protected function getOnlyMenus() {
        // not null means' child items
        return Menu::where(['parent_id' => null, 'menu_type' => Constant::MENU_TYPE['menu']])->get()->toArray();
    }

    public function create(Request $request)
    {
        $request->validate([
            'menu_title' => 'required_if:menu_type,==,'.Constant::MENU_TYPE['menu'].'|max:255',
            'menu_type' => 'required|max:50',
        ]);

        $res = [];

        if ($request->input('menu_type') == Constant::MENU_TYPE['menu']) {
            $menu = Menu::create([
                'menu_type' => $request->input('menu_type'),
                'title' => $request->input('menu_title'),
            ]);

            $res = ($menu) ? ['success' => 'Menu created successfully!'] : ['error' => 'Menu not created'];
        }

        if ($request->input('menu_type') == Constant::MENU_TYPE['route']) {

            \DB::beginTransaction();
            try {
                for ($i = 0; $i < count($request->input('data.count')); $i++) {
                    foreach ($request->except(['_token', 'selected_menu_id', 'menu_type', 'data.count']) as $name => $val) {
                        Menu::create([
                            'parent_id' => $request->input('selected_menu_id', null),
                            'menu_type' => $request->input('menu_type'),
                            'title' => $val['route_title'][$i],
                            'route' => $val['route'][$i],
                            'route_name' => $val['route_name'][$i],
                            'icon_type' => 1,
                            'icon' => ''
                        ]);
                    }
                }
                \DB::commit();
                $res = ['success' => 'Route/s Created!'];
            } catch (\Exception $e) {
                \DB::rollback();
                $res = ['error' => $e->getMessage()];
            }
        }

        return redirect()->route('menu.index')->with($res);
    }

    public function store(Request $request)
    {
    }

    public function show(Menu $menu)
    {
    }

    public function edit(Menu $menu)
    {
    }

    public function update(Request $request, Menu $menu)
    {
    }

    public function destroy(Menu $menu)
    {
    }
}
