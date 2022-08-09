<!-- Dashboard -->
<li class="vn vr rounded-sm n_ ww bg-slate-900" x-data="{ open: true }">
    <a class="block gj ld wt wi" href="#0"
       @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
        <div class="flex items-center fe">
            <div class="flex items-center">
                <svg class="ub so oi" viewBox="0 0 24 24">
                    <path class="du text-indigo-500" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path>
                    <path class="du text-indigo-600" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path>
                    <path class="du text-indigo-200" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"></path>
                </svg>
                <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">{{ $slot_title }}</span>
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
        {{ $slot_submenu }}
{{--        <x-sidebar-submenu name=""></x-sidebar-submenu>--}}
{{--        <ul class="me re" :class="open ? '!block' : 'hidden'">--}}
{{--            {{ $slot_submenu ?? '' }}--}}
{{--            <li class="rt ww">--}}
{{--                <a class="block text-indigo-500 wt wi ld" href="{{ route('dashboard') }}">--}}
{{--                    <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Main</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
    </div>
</li>
