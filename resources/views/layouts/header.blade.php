<header class="b k bg-white cs border-slate-200 tw">
    <div class="vs jj ttm">
        <div class="flex items-center fe sa rr">

            <!-- Header: Left side -->
            <div class="flex">
                <!-- Hamburger button -->
                <button class="text-slate-500 hover--text-slate-600 tex"
                        @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar"
                        :aria-expanded="sidebarOpen">
                    <span class="d">Open sidebar</span>
                    <svg class="oi so du" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="5" width="16" height="2"></rect>
                        <rect x="4" y="11" width="16" height="2"></rect>
                        <rect x="4" y="17" width="16" height="2"></rect>
                    </svg>
                </button>

            </div>

            <!-- Header: Right side -->
            <div class="flex items-center fl">

                <!-- Search button -->
                <div x-data="{ searchOpen: false }">
                    <!-- Button -->
                    <button class="os sf flex items-center justify-center hi xt wt wi rounded-full"
                            :class="{ 'hu': searchOpen }"
                            @click.prevent="searchOpen = true;if (searchOpen) $nextTick(()=>{$refs.searchInput.focus()});"
                            aria-controls="search-modal">
                        <span class="d">Search</span>
                        <svg class="oo sl" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path class="du text-slate-500"
                                  d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                            <path class="du gq"
                                  d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                        </svg>
                    </button>
                    <!-- Modal backdrop -->
                    <div class="m w bg-slate-900 pu tx bz" x-show="searchOpen" x-transition:enter="wt wa wr"
                         x-transition:enter-start="opacity-0" x-transition:enter-end="ba"
                         x-transition:leave="wt wa ws" x-transition:leave-start="ba"
                         x-transition:leave-end="opacity-0" aria-hidden="true" x-cloak=""></div>
                    <!-- Modal dialog -->
                    <div id="search-modal" class="m w tx la flex aj _ ri justify-center vs jj" role="dialog"
                         aria-modal="true" x-show="searchOpen" x-transition:enter="wt wu wr"
                         x-transition:enter-start="opacity-0 u_" x-transition:enter-end="ba uj"
                         x-transition:leave="wt wu wr" x-transition:leave-start="ba uj"
                         x-transition:leave-end="opacity-0 u_" x-cloak="">
                        <div class="bg-white lu ua ou oe rounded bd" @click.outside="searchOpen = false"
                             @keydown.escape.window="searchOpen = false">
                            <!-- Search form -->
                            <form class="cs border-slate-200">
                                <div class="y">
                                    <label for="modal-search" class="d">Search</label>
                                    <input id="modal-search" class="ou cn kf bo av vo mn mr" type="search"
                                           placeholder="Search Anything…" x-ref="searchInput">
                                    <button class="g w j kk" type="submit" aria-label="Search">
                                        <svg class="oo sl ub du gq kj rs mr-2" viewBox="0 0 16 16"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                                            <path
                                                d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                            <div class="vu vi">
                                <!-- Recent searches -->
                                <div class="ro ww">
                                    <div class="go gh gq gv vi ru">Recent searches</div>
                                    <ul class="text-sm">
                                        <li>
                                            <a class="flex items-center dx text-slate-800 xc xn rounded kk"
                                               href="#0" @click="searchOpen = false" @focus="searchOpen = true"
                                               @focusout="searchOpen = false">
                                                <svg class="oo sl du gq kq _t ub ra" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.707 14.293v.001a1 1 0 01-1.414 1.414L11.185 12.6A6.935 6.935 0 017 14a7.016 7.016 0 01-5.173-2.308l-1.537 1.3L0 8l4.873 1.12-1.521 1.285a4.971 4.971 0 008.59-2.835l1.979.454a6.971 6.971 0 01-1.321 3.157l3.107 3.112zM14 6L9.127 4.88l1.521-1.28a4.971 4.971 0 00-8.59 2.83L.084 5.976a6.977 6.977 0 0112.089-3.668l1.537-1.3L14 6z"></path>
                                                </svg>
                                                <span>Form Builder - 23 hours on-demand video</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notifications button -->
                <div class="y inline-flex" x-data="{ open: false }">
                    <button class="os sf flex items-center justify-center hi xt wt wi rounded-full"
                            :class="{ 'hu': open }" aria-haspopup="true" @click.prevent="open = !open"
                            :aria-expanded="open">
                        <span class="d">Notifications</span>
                        <svg class="oo sl" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path class="du text-slate-500"
                                  d="M6.5 0C2.91 0 0 2.462 0 5.5c0 1.075.37 2.074 1 2.922V12l2.699-1.542A7.454 7.454 0 006.5 11c3.59 0 6.5-2.462 6.5-5.5S10.09 0 6.5 0z"></path>
                            <path class="du gq"
                                  d="M16 9.5c0-.987-.429-1.897-1.147-2.639C14.124 10.348 10.66 13 6.5 13c-.103 0-.202-.018-.305-.021C7.231 13.617 8.556 14 10 14c.449 0 .886-.04 1.307-.11L15 16v-4h-.012C15.627 11.285 16 10.425 16 9.5z"></path>
                        </svg>
                        <div class="g k q oa sc ha cr cc rounded-full"></div>
                    </button>
                    <div class="uk tk g z q rf _g ut bg-white border border-slate-200 va rounded bd la re"
                         @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                         x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 uq"
                         x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                         x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                        <div class="go gh gq gv mi ms vs">Notifications</div>
                        <ul>
                            <li class="cs border-slate-200 wk">
                                <a class="block vr vs xr" href="#0" @click="open = false" @focus="open = true"
                                   @focusout="open = false">
                                    <span class="block text-sm ru">📣 <span class="gp text-slate-800">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                                    <span class="block go gp gq">Feb 12, 2021</span>
                                </a>
                            </li>
                            <li class="cs border-slate-200 wk">
                                <a class="block vr vs xr" href="#0" @click="open = false" @focus="open = true"
                                   @focusout="open = false">
                                    <span class="block text-sm ru">📣 <span class="gp text-slate-800">Edit your information in a swipe</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                                    <span class="block go gp gq">Feb 9, 2021</span>
                                </a>
                            </li>
                            <li class="cs border-slate-200 wk">
                                <a class="block vr vs xr" href="#0" @click="open = false" @focus="open = true"
                                   @focusout="open = false">
                                    <span class="block text-sm ru">🚀<span class="gp text-slate-800">Say goodbye to paper receipts!</span> Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.</span>
                                    <span class="block go gp gq">Jan 24, 2020</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Info button -->
                <div class="y inline-flex" x-data="{ open: false }">
                    <button class="os sf flex items-center justify-center hi xt wt wi rounded-full"
                            :class="{ 'hu': open }" aria-haspopup="true" @click.prevent="open = !open"
                            :aria-expanded="open">
                        <span class="d">Info</span>
                        <svg class="oo sl" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path class="du text-slate-500"
                                  d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                        </svg>
                    </button>
                    <div class="uk tk g z q un bg-white border border-slate-200 va rounded bd la re"
                         @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                         x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 uq"
                         x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                         x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                        <div class="go gh gq gv mi ms vn">Need help?</div>
                        <ul>
                            <li>
                                <a class="gp text-sm text-indigo-500 xh flex items-center vf vn" href="#0"
                                   @click="open = false" @focus="open = true" @focusout="open = false">
                                    <svg class="w-3 h-3 du text-indigo-300 ub mr-2" viewBox="0 0 12 12">
                                        <rect y="3" width="12" height="9" rx="1"></rect>
                                        <path d="M2 0h8v2H2z"></path>
                                    </svg>
                                    <span>Documentation</span>
                                </a>
                            </li>
                            <li>
                                <a class="gp text-sm text-indigo-500 xh flex items-center vf vn" href="#0"
                                   @click="open = false" @focus="open = true" @focusout="open = false">
                                    <svg class="w-3 h-3 du text-indigo-300 ub mr-2" viewBox="0 0 12 12">
                                        <path
                                            d="M10.5 0h-9A1.5 1.5 0 000 1.5v9A1.5 1.5 0 001.5 12h9a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0010.5 0zM10 7L8.207 5.207l-3 3-1.414-1.414 3-3L5 2h5v5z"></path>
                                    </svg>
                                    <span>Support Site</span>
                                </a>
                            </li>
                            <li>
                                <a class="gp text-sm text-indigo-500 xh flex items-center vf vn" href="#0"
                                   @click="open = false" @focus="open = true" @focusout="open = false">
                                    <svg class="w-3 h-3 du text-indigo-300 ub mr-2" viewBox="0 0 12 12">
                                        <path
                                            d="M11.854.146a.5.5 0 00-.525-.116l-11 4a.5.5 0 00-.015.934l4.8 1.921 1.921 4.8A.5.5 0 007.5 12h.008a.5.5 0 00.462-.329l4-11a.5.5 0 00-.116-.525z"></path>
                                    </svg>
                                    <span>Contact us</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="of so hu">

                <!-- User button -->
                <div class="y inline-flex" x-data="{ open: false }">
                    <button class="inline-flex justify-center items-center kk" aria-haspopup="true"
                            @click.prevent="open = !open" :aria-expanded="open">
                        <img class="os sf rounded-full" src="{{ asset('/images/ui/user-avatar-32.png') }}" width="32" height="32"
                             alt="User">
                        <div class="flex items-center ld">
                            <span class="ld nq text-sm gp kz">{{ Auth::user()->name }}</span>
                            <svg class="w-3 h-3 ub nz du gq" viewBox="0 0 12 12">
                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                            </svg>
                        </div>
                    </button>
                    <div class="uk tk g z q un bg-white border border-slate-200 va rounded bd la re"
                         @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                         x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 uq"
                         x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                         x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                        <div class="mu ms vn rt cs border-slate-200">
                            <div class="gp text-slate-800">{{ Auth::user()->name }}</div>
                            <div class="go text-slate-500 gm">{{ Auth::user()->email }}</div>
                        </div>
                        <ul>
                            <li>
                                <a class="gp text-sm text-indigo-500 xh flex items-center vf vn"
                                   href="settings.html" @click="open = false" @focus="open = true"
                                   @focusout="open = false">Settings</a>
                            </li>
                            <li>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" class="gp text-sm text-indigo-500 xh flex items-center vf vn"
                                                 onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>
</header>
