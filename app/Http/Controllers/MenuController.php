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

        return view('menu.index', [
            'current_menu' => $this->getCurrentMenu($selected_menu),
            'onlyMenus' => $this->getOnlyMenus(),
            'selectedMenuRoutes' =>  $this->getSelectedMenuRoutes($selected_menu),
        ]);
    }

    protected function getOnlyMenus() {
        // not null means' child items
        return Menu::where(['parent_id' => null, 'menu_type' => Constant::MENU_TYPE['menu']])->get()->toArray();
    }

    protected function getCurrentMenu($menu_id) {
        // not null means' child items
        return Menu::where(['id' => $menu_id, 'menu_type' => Constant::MENU_TYPE['menu']])->first();
    }

    protected function getSelectedMenuRoutes($menu_id) {
        return Menu::where([
            'parent_id' => $menu_id,
            'menu_type' => Constant::MENU_TYPE['route']
        ])->get();
    }

    public function create(Request $request)
    {
        $request->validate([
            'menu_title' => 'required_if:menu_type,==,'.Constant::MENU_TYPE['menu'].'|max:255',
            'menu_type' => 'required|max:50',
        ]);

        $res = [];

        if ($request->input('menu_type') == Constant::MENU_TYPE['menu']) {
            $menu = Menu::updateOrCreate(
                ['id' => $request->input('selected_menu_id')],
                ['menu_type' => $request->input('menu_type'), 'title' => $request->input('menu_title')]
            );

            $res = ($menu) ? ['success' => 'Menu created successfully!'] : ['error' => 'Menu not created'];
        }

        if ($request->input('menu_type') == Constant::MENU_TYPE['route']) {

            //Menu::where('parent_id', '=', $request->input('selected_menu_id'))->delete();

            \DB::beginTransaction();

            try {
                for ($i = 0; $i < count($request->input('data.count')); $i++) {
                    foreach ($request->except(['_token', 'action', 'selected_menu_id', 'menu_type', 'data.count']) as $dataVal) {
                        Menu::create([
                            'parent_id' => $request->input('selected_menu_id', null),
                            'child_id' =>  ($dataVal['route_parent'][$i] != 'None') ? $dataVal['route_parent'][$i] : null,
                            'menu_type' => $request->input('menu_type'),
                            'title' => $dataVal['route_title'][$i],
                            'route' => $dataVal['route'][$i],
                            'route_name' => $dataVal['route_name'][$i],
                            'icon_type' => 1,
                            'icon' => '']
                        );
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
