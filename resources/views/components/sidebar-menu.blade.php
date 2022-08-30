{{-- @devhassam --}}
<style>
    /*.sidebar-expanded .ttz {*/
    /*    width: 90rem !important;*/
    /*}*/
</style>

{{-- sidebar-menu is loaded using view-composers --}}

<div class="ff">
    <div>
        <h3 class="go gv text-slate-500 gh vz">
            <span class="hidden tey ttq 2xl:hidden gn oi" aria-hidden="true">•••</span>
            <span class="tex ttj 2xl:block">Main</span>
        </h3>
        <ul class="mt-3">
            @foreach($dashboardMenu->submenu as $index => $route)
                <!-- single menu -->
                @if(!$route->childRoutes->count() && is_null($route->child_id))
                    <li class="py-2 px-2 mb-1.5 hover:bg-gray-100 hover:transition hover:transition-colors rounded {{ ($route->route_name == Route::currentRouteName()) ? 'bg-gray-100' : '' }}">
                        <div class="flex items-center">
                            {!! $route->icon !!}
                            <a class="block w-full text-gray-700 hover:text-gray-700 wt whitespace-nowrap {{ ($route->route_name == Route::currentRouteName()) ? 'text-indigo-500' : '' }}" href="{{ $route->route }}">
                                <span class="text-sm ml-3 ttw tnn 2xl:opacity--100 wr">{{ $route['title'] }}</span>
                            </a>
                        </div>
                    </li>
                <!-- dropdown menu -->
                @elseif($route->childRoutes->count() > 0)
                    @php
                        $childRouteNamesArr = [];
                        foreach ($route->childRoutes as $routeNames) {
                            $childRouteNamesArr[] = $routeNames->route_name;
                        }
                        $isAnyChildRouteMatch = in_array(Route::currentRouteName(), $childRouteNamesArr);
                        $alpineObj = ($isAnyChildRouteMatch) ? "{open: true}" : "{open: false}";
                    @endphp
                    <li class="py-2 px-2 mb-1.5 hover:bg-gray-100 hover:transition hover:transition-colors rounded" :class="open ? 'bg-gray-100' : ''" x-data="{{ $alpineObj }}">
                        <a class="block w-full text-gray-700 hover:text-gray-700 wt whitespace-nowrap" href="javascript:void(0)" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fe">
                                <div class="flex items-center">
                                    {!! $route->icon !!}
                                    <span class="text-sm ml-3 ttw tnn 2xl:opacity--100 wr">{{ $route['title'] }}</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                    <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path></svg>
                                </div>
                            </div>
                        </a>
                        <div class="tex ttj 2xl:block">
                            <ul class="pl-10 mt-2" :class="open ? '!block' : 'hidden'">
                            @foreach($route->childRoutes as $childRoutes)
                                <li class="mb-1.5">
                                    <a class="block w-full text-gray-400 hover:text-gray-600 wt {{ ($childRoutes->route_name == Route::currentRouteName()) ? 'text-indigo-500' : '' }}" href="{{ route($childRoutes->route_name) }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">{{ $childRoutes->title }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
            @endforeach
            <li class="py-2 px-2 hover:bg-gray-100 hover:transition hover:transition-colors rounded">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="flex items-center">
                        <svg class="ub so oi" viewBox="0 0 24 24">
                            <path class="du g_" d="M8.07 16H10V8H8.07a8 8 0 110 8z"></path>
                            <path class="du gq" d="M15 12L8 6v5H0v2h8v5z"></path>
                        </svg>
                        <a class="block w-full text-gray-700 hover:text-gray-700 wt whitespace-nowrap" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();">
                            <span class="text-sm ml-3 ttw tnn 2xl:opacity--100 wr">Logout</span>
                        </a>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</div>
