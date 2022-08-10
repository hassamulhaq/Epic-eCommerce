{{-- @devhassam --}}
<style>
/*    .sidebar-expanded .ttz {
        width: 90rem !important;
    }*/
</style>
@php
    /*$menus = [
        [
            "id" => 1,
            "hasSubMenu" => false,
            "title" => "Dashboard",
            "route" => "dashboard",
            "icon" => [
                "svg" => '<svg class="ub so oi" viewBox="0 0 24 24"><path class="du gq" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path><path class="du g_" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path><path class="du gq" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"></path></svg>',
                "image" => ''
            ]
        ],
        [
            "id" => 2,
            "hasSubMenu" => true,
            "title" => "E-Commerce",
            "route" => "ecommerce",
            "icon" => [
                "svg" => '<svg class="ub so oi" viewBox="0 0 24 24"><path class="du gq" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z"></path><path class="du gz" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z"></path><path class="du g_" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z"></path></svg>',
                "image" => ''
            ],
            "submenu" => [
                "Orders" => "orders",
                "Products" => "products"
            ]
        ]
    ];*/

    $menus = \App\Models\Menu::where('parent_id', null)
    ->with('submenu')
    ->get();

@endphp

<div class="ff">
    <div>
        <h3 class="go gv text-slate-500 gh vz">
            <span class="hidden tey ttq 2xl:hidden gn oi" aria-hidden="true">•••</span>
            <span class="tex ttj 2xl:block">Main</span>
        </h3>
        <ul class="nk">
            @foreach($menus as $index => $menu)
                <!-- single -->
                @if(!$menu->submenu->count())
                    <li class="vn vr rounded-sm n_ ww {{ ($menu->route_name == Route::currentRouteName()) ? 'bg-slate-900' : '' }}">
                        <a class="block gj xc ld wt wi " href="{{ $menu->route }}">
                            <div class="flex items-center">
                                {!! $menu->icon !!}
                                <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">{{ $menu->title }}</span>
                            </div>
                        </a>
                    </li>
                <!-- submenu -->
                @else
                    <!-- active parent_menu if its any child_menu is active -->
                        {{--<li class="vn vr rounded-sm n_" :class="open ? 'bg-slate-900' : 'ao'" x-data="{{ ($menu->route_name == Route::currentRouteName()) ? '{ open: true }' : '{ open: false }' }}">--}}
                    <li class="vn vr rounded-sm n_" :class="open ? 'bg-slate-900' : 'ao'" x-data="{ open: false }">
                        <a class="block gj ld wt wi" href="#0"
                           @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fe">
                                <div class="flex items-center">
                                    {!! $menu->icon !!}
                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">{{ $menu['title'] }}</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                    <svg class="w-3 h-3 ub nz du gq" :class="open ? 'as' : 'ao'"
                                         viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="tex ttj 2xl:block">
                            @if(count($menu->submenu))
                                <ul class="me re" :class="open ? '!block' : 'hidden'">

                                    @foreach($menu->submenu as $submenu_index => $submenu_menu)
                                        <li class="rt ww">
                                            <a class="block gq hover--text-slate-200 wt wi ld {{ ($submenu_menu->route_name == Route::currentRouteName()) ? 'text-indigo-500' : '' }}"
                                               href="{{ $submenu_menu->route }}">
                                                <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">{{ $submenu_menu->title }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </li>
                @endif
            @endforeach

            <li class="vn vr rounded-sm n_ ww">
                <form method="POST" action="{{ route('logout') }}">
                    <input type="hidden" name="_token" value="x0yKXAdJEqI2xQcLMSYglZaDrWTt9mObSAzC9yyb">
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
