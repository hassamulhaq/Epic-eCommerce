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
        <ul class="nk">
            @foreach($dashboardMenu->submenu as $index => $route)
                <!-- single menu -->
                @if(!$route->childRoutes->count() && is_null($route->child_id))
                    <li class="vn vr rounded-sm n_ ww">
                        <div class="flex items-center">
                            {!! $route->icon !!}
                            <a class="block gq hover--text-slate-200 wt wi ld {{ ($route->route_name == Route::currentRouteName()) ? 'text-indigo-500' : '' }}" href="{{ $route->route }}">
                                <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">{{ $route['title'] }}</span>
                            </a>
                        </div>
                    </li>
                <!-- dropdown menu -->
                @elseif($route->childRoutes->count() > 0)
                    {{--<li class="vn vr rounded-sm n_" :class="open ? 'bg-slate-900' : 'ao'" x-data="{{ ($route->route_name == Route::currentRouteName()) ? '{ open: true }' : '{ open: false }' }}"></li>--}}
                    <li class="vn vr rounded-sm n_" :class="open ? 'bg-slate-900' : 'ao'" x-data="{ open: false }">
                        <a class="block gj ld wt wi" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fe">
                                <div class="flex items-center">
                                    {!! $route->icon !!}
                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">{{ $route['title'] }}</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                    <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'" viewBox="0 0 12 12"><path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path></svg>
                                </div>
                            </div>
                        </a>
                        <div class="tex ttj 2xl:block">
                            <ul class="me re" :class="open ? '!block' : 'hidden'">
                            @foreach($route->childRoutes as $childRoutes)
                                <li class="rt ww">
                                    <a class="block gq hover--text-slate-200 wt wi ld {{ ($childRoutes->route_name == Route::currentRouteName()) ? 'text-indigo-500' : '' }}" href="{{ $childRoutes->route }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">{{ $childRoutes->title }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
            @endforeach
            <li class="vn vr rounded-sm n_ ww">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="flex items-center">
                        <svg class="ub so oi" viewBox="0 0 24 24">
                            <path class="du g_" d="M8.07 16H10V8H8.07a8 8 0 110 8z"></path>
                            <path class="du gq" d="M15 12L8 6v5H0v2h8v5z"></path>
                        </svg>
                        <a class="block gj xc ld wt wi" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();"><span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Logout</span></a>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</div>
