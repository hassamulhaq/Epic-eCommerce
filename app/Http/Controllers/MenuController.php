<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $selected_menu = (int) $request->input('selected_menu');
        $onlyMenus = $this->getOnlyMenus();

        $routes = Menu::where(['parent_id' => $selected_menu, 'menu_type' => 'route'])->get();

        return view('menu.index', ['onlyMenus' => $onlyMenus, 'routes' => $routes]);
    }

    protected function getOnlyMenus() {
        // not null means' child items
        return Menu::where(['parent_id' => null, 'menu_type' => 'menu'])->get()->toArray();
    }

    public function create(Request $request)
    {
        $request->validate([
            'menu_title' => 'required|max:255',
            'menu_type' => 'required|max:50',
        ]);

        $menu = Menu::create([
            'menu_type' => $request->input('menu_type'),
            'title' => $request->input('menu_title'),
        ]);


        if (!$menu) return redirect()->route('menu.index')->with('error','Item not created');

        return redirect()->route('menu.index')->with('success','Item created successfully!');
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
