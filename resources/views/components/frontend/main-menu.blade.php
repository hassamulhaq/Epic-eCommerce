<div class="lg:flex flex-1 items-center hidden">
    <div class="flex-1">
        @php
            $menu = \App\Models\Menu::with('submenu.childRoutes')
            ->whereNull(['parent_id', 'child_id'])
            ->whereMenuType(\App\Helpers\Constant::MENU_TYPE['menu'])
            ->whereTitle(\App\Helpers\Constant::FRONTEND_MAIN_MENU['frontend'])
            ->first();
        @endphp
        <ul class="items-stretch space-x-3 lg:flex">
            @foreach($menu->submenu as $route)
                <li class="flex">
                    <a rel="noopener noreferrer" href="{{ route($route->route_name) }}"
                       class="flex items-center px-4 py-1 -mb-1 border-b-2 border-transparent
                        {{ (request()->routeIs($route->route_name)) ? 'border-indigo-600' : '' }}">
                        {{ $route->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="">
        @if (Route::has('login'))
            @auth
                <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        @endif
    </div>
</div>
