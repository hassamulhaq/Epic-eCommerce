<!-- Welcome banner -->
@include('dashboard.widgets.welcome-banner')

<!-- Dashboard actions -->
<div class="je jd jc rc">

    <!-- Left: Avatars -->
    <ul class="flex flex-wrap justify-center jh rc _y fp rd">
        <li>
            <a class="block" href="#0">
                <img class="op sv rounded-full" src="{{ asset('/images/ui/user-36-01.jpg') }}" width="36" height="36"
                     alt="User 01">
            </a>
        </li>
        <li>
            <a class="block" href="#0">
                <img class="op sv rounded-full" src="{{ asset('/images/ui/user-36-02.jpg') }}" width="36" height="36"
                     alt="User 02">
            </a>
        </li>
        <li>
            <a class="block" href="#0">
                <img class="op sv rounded-full" src="{{ asset('/images/ui/user-36-03.jpg') }}" width="36" height="36"
                     alt="User 03">
            </a>
        </li>
        <li>
            <a class="block" href="#0">
                <img class="op sv rounded-full" src="{{ asset('/images/ui/user-36-04.jpg') }}" width="36" height="36"
                     alt="User 04">
            </a>
        </li>
        <li>
            <button
                class="flex justify-center items-center op sv rounded-full bg-white border border-slate-200 hover--border-slate-300 text-indigo-500 bv wt wi nq">
                <span class="d">Add new user</span>
                <svg class="oo sl du" viewBox="0 0 16 16">
                    <path
                        d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                </svg>
            </button>
        </li>
    </ul>

    <!-- Right: Actions -->
    <div class="sn am jo az jp ft">

        <!-- Filter button -->
        <div class="y inline-flex" x-data="{ open: false }">
            <button
                class="btn bg-white border-slate-200 hover--border-slate-300 text-slate-500 hover--text-slate-600"
                aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                <span class="d">Filter</span>
                <wbr>
                <svg class="oo sl du" viewBox="0 0 16 16">
                    <path
                        d="M9 15H7a1 1 0 010-2h2a1 1 0 010 2zM11 11H5a1 1 0 010-2h6a1 1 0 010 2zM13 7H3a1 1 0 010-2h10a1 1 0 010 2zM15 3H1a1 1 0 010-2h14a1 1 0 010 2z"></path>
                </svg>
            </button>
            <div class="uk tk g z x j qc qh ui bg-white border border-slate-200 mi rounded bd la re"
                 @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                 x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 uq"
                 x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                 x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                <div class="go gh gq gv mi ms vs">Filters</div>
                <ul class="ri">
                    <li class="vf vn">
                        <label class="flex items-center">
                            <input type="checkbox" class="i" checked="">
                            <span class="text-sm gp nq">Direct VS Indirect</span>
                        </label>
                    </li>
                    <li class="vf vn">
                        <label class="flex items-center">
                            <input type="checkbox" class="i" checked="">
                            <span class="text-sm gp nq">Real Time Value</span>
                        </label>
                    </li>
                    <li class="vf vn">
                        <label class="flex items-center">
                            <input type="checkbox" class="i" checked="">
                            <span class="text-sm gp nq">Top Channels</span>
                        </label>
                    </li>
                    <li class="vf vn">
                        <label class="flex items-center">
                            <input type="checkbox" class="i">
                            <span class="text-sm gp nq">Sales VS Refunds</span>
                        </label>
                    </li>
                    <li class="vf vn">
                        <label class="flex items-center">
                            <input type="checkbox" class="i">
                            <span class="text-sm gp nq">Last Order</span>
                        </label>
                    </li>
                    <li class="vf vn">
                        <label class="flex items-center">
                            <input type="checkbox" class="i">
                            <span class="text-sm gp nq">Total Spent</span>
                        </label>
                    </li>
                </ul>
                <div class="vr vn co border-slate-200 hp">
                    <ul class="flex items-center fe">
                        <li>
                            <button
                                class="btn-xs bg-white border-slate-200 hover--border-slate-300 text-slate-500 hover--text-slate-600">
                                Clear
                            </button>
                        </li>
                        <li>
                            <button class="btn-xs ho xi ye" @click="open = false"
                                    @focusout="open = false">Apply
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Datepicker built with flatpickr -->
        <div class="y">
            <input class="datepicker s me text-slate-500 hover--text-slate-600 gp xq ol"
                   placeholder="Select dates" data-class="flatpickr-right">
            <div class="g w j flex items-center pointer-events-none">
                <svg class="oo sl du text-slate-500 ml-3" viewBox="0 0 16 16">
                    <path
                        d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z"></path>
                </svg>
            </div>
        </div>

        <!-- Add view button -->
        <button class="btn ho xi ye">
            <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                <path
                    d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
            </svg>
            <span class="hidden trm nq">Add View</span>
        </button>

    </div>

</div>

<!-- Cards -->
<div class="sn ag fn">

    <!-- Line chart (Analytics) -->
    <div class="flex ak tz tni bg-white bd rounded-sm border border-slate-200">
        <header class="vc vu cs ch flex items-center">
            <h2 class="gh text-slate-800">Analytics</h2>
        </header>
        <div class="vc vf">
            <div class="flex flex-wrap">
                <!-- Unique Visitors -->
                <div class="flex items-center vr">
                    <div class="rp">
                        <div class="flex items-center">
                            <div class="text-3xl font-bold text-slate-800 mr-2">24.7K</div>
                            <div class="text-sm gp yt">+49%</div>
                        </div>
                        <div class="text-sm text-slate-500">Unique Visitors</div>
                    </div>
                    <div class="hidden qx of sf hu rp" aria-hidden="true"></div>
                </div>
                <!-- Total Pageviews -->
                <div class="flex items-center vr">
                    <div class="rp">
                        <div class="flex items-center">
                            <div class="text-3xl font-bold text-slate-800 mr-2">56.9K</div>
                            <div class="text-sm gp yt">+7%</div>
                        </div>
                        <div class="text-sm text-slate-500">Total Pageviews</div>
                    </div>
                    <div class="hidden qx of sf hu rp" aria-hidden="true"></div>
                </div>
                <!-- Bounce Rate -->
                <div class="flex items-center vr">
                    <div class="rp">
                        <div class="flex items-center">
                            <div class="text-3xl font-bold text-slate-800 mr-2">54%</div>
                            <div class="text-sm gp yn">-7%</div>
                        </div>
                        <div class="text-sm text-slate-500">Bounce Rate</div>
                    </div>
                    <div class="hidden qx of sf hu rp" aria-hidden="true"></div>
                </div>
                <!-- Visit Duration-->
                <div class="flex items-center">
                    <div>
                        <div class="flex items-center">
                            <div class="text-3xl font-bold text-slate-800 mr-2">2m 56s</div>
                            <div class="text-sm gp yn">+7%</div>
                        </div>
                        <div class="text-sm text-slate-500">Visit Duration</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Chart built with Chart.js 3 -->
        <!-- Check out src/js/components/analytics-card-01.js for config -->
        <div class="uw">
            <!-- Change the height attribute to adjust the chart height -->
            <canvas id="analytics-card-01" width="971" height="315"
                    style="display: block; box-sizing: border-box; height: 315px; width: 971px;"></canvas>
        </div>
    </div>

    <!--  Line chart (Active Users Right Now) -->
    <div class="flex ak tz tns bg-white bd rounded-sm border border-slate-200">
        <header class="vc vu cs ch">
            <h2 class="gh text-slate-800">Active Users Right Now</h2>
        </header>
        <!-- Card content -->
        <div class="flex ak sh">
            <!-- Live visitors number -->
            <div class="vc vo">
                <div class="flex items-center">
                    <!-- Red dot -->
                    <div class="y flex items-center justify-center oo sl rounded-full hf ra" aria-hidden="true">
                        <div class="g oc sp rounded-full ha"></div>
                    </div>
                    <!-- Vistors number -->
                    <div>
                        <div class="text-3xl font-bold text-slate-800 mr-2">347</div>
                        <div class="text-sm text-slate-500">Live visitors</div>
                    </div>
                </div>
            </div>

            <!-- Chart built with Chart.js 3 -->
            <!-- Check out src/js/components/analytics-card-02.js for config -->
            <div>
                <!-- Change the height attribute to adjust the chart height -->
                <canvas id="analytics-card-02" width="472" height="70"
                        style="display: block; box-sizing: border-box; height: 70px; width: 472px;"></canvas>
            </div>

            <!-- Table -->
            <div class="uw vc mt mf">
                <div class="lf">
                    <table class="ux ou">
                        <!-- Table header -->
                        <thead class="go gv gq">
                        <tr>
                            <th class="vr">
                                <div class="gh gt">Top pages</div>
                            </th>
                            <th class="vr">
                                <div class="gh gr">Active users</div>
                            </th>
                        </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody class="text-sm le ln">
                        <!-- Row -->
                        <tr>
                            <td class="vr">
                                <div class="gt">preview.cruip.com/open-pro/</div>
                            </td>
                            <td class="vr">
                                <div class="gp gr text-slate-800">94</div>
                            </td>
                        </tr>
                        <!-- Row -->
                        <tr>
                            <td class="vr">
                                <div class="gt">preview.cruip.com/simple/</div>
                            </td>
                            <td class="vr">
                                <div class="gp gr text-slate-800">42</div>
                            </td>
                        </tr>
                        <!-- Row -->
                        <tr>
                            <td class="vr">
                                <div class="gt">cruip.com/unlimited/</div>
                            </td>
                            <td class="vr">
                                <div class="gp gr text-slate-800">12</div>
                            </td>
                        </tr>
                        <!-- Row -->
                        <tr>
                            <td class="vr">
                                <div class="gt">preview.cruip.com/twist/</div>
                            </td>
                            <td class="vr">
                                <div class="gp gr text-slate-800">4</div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Card footer -->
            <div class="gr vc ml">
                <a class="text-sm gp text-indigo-500 xh" href="#0">Real-Time Report -&gt;</a>
            </div>
        </div>
    </div>

    <!-- Line chart (Acme Plus) -->
    <div class="flex ak tz _c tns bg-white bd rounded-sm border border-slate-200">
        <div class="vc mb">
            <header class="flex fe aj ru">
                <!-- Icon -->
                <img src="{{ asset('/images/ui/icon-01.svg') }}" width="32" height="32" alt="Icon 01">
                <!-- Menu button -->
                <div class="y inline-flex" x-data="{ open: false }">
                    <button class="gq xv rounded-full" :class="{ 'hi text-slate-500': open }"
                            aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                        <span class="d">Menu</span>
                        <svg class="os sf du" viewBox="0 0 32 32">
                            <circle cx="16" cy="16" r="2"></circle>
                            <circle cx="10" cy="16" r="2"></circle>
                            <circle cx="22" cy="16" r="2"></circle>
                        </svg>
                    </button>
                    <div class="uk tk g z q us bg-white border border-slate-200 va rounded bd la re"
                         @click.outside="open = false" @keydown.escape.window="open = false"
                         x-show="open" x-transition:enter="wt wa wr au"
                         x-transition:enter-start="opacity-0 uq" x-transition:enter-end="ba uj"
                         x-transition:leave="wt wa wr" x-transition:leave-start="ba"
                         x-transition:leave-end="opacity-0" x-cloak="">
                        <ul>
                            <li>
                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                   @focus="open = true" @focusout="open = false">Option 1</a>
                            </li>
                            <li>
                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                   @focus="open = true" @focusout="open = false">Option 2</a>
                            </li>
                            <li>
                                <a class="gp text-sm yl xy flex vf vn" href="#0" @click="open = false"
                                   @focus="open = true" @focusout="open = false">Remove</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <h2 class="ga gh text-slate-800 ru">Acme Plus</h2>
            <div class="go gh gq gv rt">Sales</div>
            <div class="flex aj">
                <div class="text-3xl font-bold text-slate-800 mr-2">$24,780</div>
                <div class="text-sm gh ye vk hd rounded-full">+49%</div>
            </div>
        </div>
        <!-- Chart built with Chart.js 3 -->
        <!-- Check out src/js/components/dashboard-card-01.js for config -->
        <div class="uw">
            <!-- Change the height attribute to adjust the chart height -->
            <canvas id="dashboard-card-01" width="389" height="128"></canvas>
        </div>
    </div>

    <!-- Line chart (Acme Advanced) -->
    <div class="flex ak tz _c tns bg-white bd rounded-sm border border-slate-200">
        <div class="vc mb">
            <header class="flex fe aj ru">
                <!-- Icon -->
                <img src="{{ asset('/images/ui/icon-02.svg') }}" width="32" height="32" alt="Icon 02">
                <!-- Menu button -->
                <div class="y inline-flex" x-data="{ open: false }">
                    <button class="gq xv rounded-full" :class="{ 'hi text-slate-500': open }"
                            aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                        <span class="d">Menu</span>
                        <svg class="os sf du" viewBox="0 0 32 32">
                            <circle cx="16" cy="16" r="2"></circle>
                            <circle cx="10" cy="16" r="2"></circle>
                            <circle cx="22" cy="16" r="2"></circle>
                        </svg>
                    </button>
                    <div class="uk tk g z q us bg-white border border-slate-200 va rounded bd la re"
                         @click.outside="open = false" @keydown.escape.window="open = false"
                         x-show="open" x-transition:enter="wt wa wr au"
                         x-transition:enter-start="opacity-0 uq" x-transition:enter-end="ba uj"
                         x-transition:leave="wt wa wr" x-transition:leave-start="ba"
                         x-transition:leave-end="opacity-0" x-cloak="">
                        <ul>
                            <li>
                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                   @focus="open = true" @focusout="open = false">Option 1</a>
                            </li>
                            <li>
                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                   @focus="open = true" @focusout="open = false">Option 2</a>
                            </li>
                            <li>
                                <a class="gp text-sm yl xy flex vf vn" href="#0" @click="open = false"
                                   @focus="open = true" @focusout="open = false">Remove</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <h2 class="ga gh text-slate-800 ru">Acme Advanced</h2>
            <div class="go gh gq gv rt">Sales</div>
            <div class="flex aj">
                <div class="text-3xl font-bold text-slate-800 mr-2">$17,489</div>
                <div class="text-sm gh ye vk hy rounded-full">-14%</div>
            </div>
        </div>
        <!-- Chart built with Chart.js 3 -->
        <!-- Check out src/js/components/dashboard-card-01.js for config -->
        <div class="uw">
            <!-- Change the height attribute to adjust the chart height -->
            <canvas id="dashboard-card-02" width="389" height="128"></canvas>
        </div>
    </div>

    <!-- Line chart (Acme Professional) -->
    <div class="flex ak tz _c tns bg-white bd rounded-sm border border-slate-200">
        <div class="vc mb">
            <header class="flex fe aj ru">
                <!-- Icon -->
                <img src="{{ asset('/images/ui/icon-03.svg') }}" width="32" height="32" alt="Icon 03">
                <!-- Menu button -->
                <div class="y inline-flex" x-data="{ open: false }">
                    <button class="gq xv rounded-full" :class="{ 'hi text-slate-500': open }"
                            aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                        <span class="d">Menu</span>
                        <svg class="os sf du" viewBox="0 0 32 32">
                            <circle cx="16" cy="16" r="2"></circle>
                            <circle cx="10" cy="16" r="2"></circle>
                            <circle cx="22" cy="16" r="2"></circle>
                        </svg>
                    </button>
                    <div class="uk tk g z q us bg-white border border-slate-200 va rounded bd la re"
                         @click.outside="open = false" @keydown.escape.window="open = false"
                         x-show="open" x-transition:enter="wt wa wr au"
                         x-transition:enter-start="opacity-0 uq" x-transition:enter-end="ba uj"
                         x-transition:leave="wt wa wr" x-transition:leave-start="ba"
                         x-transition:leave-end="opacity-0" x-cloak="">
                        <ul>
                            <li>
                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                   @focus="open = true" @focusout="open = false">Option 1</a>
                            </li>
                            <li>
                                <a class="gp text-sm g_ xg flex vf vn" href="#0" @click="open = false"
                                   @focus="open = true" @focusout="open = false">Option 2</a>
                            </li>
                            <li>
                                <a class="gp text-sm yl xy flex vf vn" href="#0" @click="open = false"
                                   @focus="open = true" @focusout="open = false">Remove</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <h2 class="ga gh text-slate-800 ru">Acme Professional</h2>
            <div class="go gh gq gv rt">Sales</div>
            <div class="flex aj">
                <div class="text-3xl font-bold text-slate-800 mr-2">$9,962</div>
                <div class="text-sm gh ye vk hd rounded-full">+29%</div>
            </div>
        </div>
        <!-- Chart built with Chart.js 3 -->
        <!-- Check out src/js/components/dashboard-card-01.js for config -->
        <div class="uw">
            <!-- Change the height attribute to adjust the chart height -->
            <canvas id="dashboard-card-03" width="389" height="128"></canvas>
        </div>
    </div>

    <!-- Bar chart (Direct vs Indirect) -->
    <div class="flex ak tz _c bg-white bd rounded-sm border border-slate-200">
        <header class="vc vu cs ch">
            <h2 class="gh text-slate-800">Direct VS Indirect</h2>
        </header>
        <!-- Chart built with Chart.js 3 -->
        <!-- Check out src/js/components/dashboard-card-04.js for config -->
        <div id="dashboard-card-04-legend" class="vc vo">
            <ul class="flex flex-wrap"></ul>
        </div>
        <div class="uw">
            <!-- Change the height attribute to adjust the chart height -->
            <canvas id="dashboard-card-04" width="595" height="248"></canvas>
        </div>
    </div>

    <!-- Line chart (Real Time Value) -->
    <div class="flex ak tz _c bg-white bd rounded-sm border border-slate-200">
        <header class="vc vu cs ch flex items-center">
            <h2 class="gh text-slate-800">Real Time Value</h2>
            <div class="y nq" x-data="{ open: false }" @mouseenter="open = true"
                 @mouseleave="open = false">
                <button class="block" aria-haspopup="true" :aria-expanded="open" @focus="open = true"
                        @focusout="open = false" @click.prevent="">
                    <svg class="oo sl du gq" viewBox="0 0 16 16">
                        <path
                            d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                    </svg>
                </button>
                <div class="tk g ti ts uz">
                    <div class="bg-white border border-slate-200 dk rounded bd la ru" x-show="open"
                         x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 an"
                         x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                         x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                        <div class="go gn lm">Built with <a class="br" @focus="open = true"
                                                            @focusout="open = false"
                                                            href="https://www.chartjs.org/"
                                                            target="_blank">Chart.js</a></div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Chart built with Chart.js 3 -->
        <!-- Check out src/js/components/dashboard-card-05.js for config -->
        <div class="vc vo">
            <div class="flex aj">
                <div class="text-3xl font-bold text-slate-800 mr-2 gy">$<span
                        id="dashboard-card-05-value">57.81</span></div>
                <div id="dashboard-card-05-deviation" class="text-sm gh ye vk rounded-full"></div>
            </div>
        </div>
        <div class="uw">
            <!-- Change the height attribute to adjust the chart height -->
            <canvas id="dashboard-card-05" width="595" height="248"></canvas>
        </div>
    </div>

    <!-- Doughnut chart (Top Countries) -->
    <div class="flex ak tz _c tns bg-white bd rounded-sm border border-slate-200">
        <header class="vc vu cs ch">
            <h2 class="gh text-slate-800">Top Countries</h2>
        </header>
        <!-- Chart built with Chart.js 3 -->
        <!-- Check out src/js/components/dashboard-card-06.js for config -->
        <div class="uw flex ak justify-center">
            <div>
                <!-- Change the height attribute to adjust the chart height -->
                <canvas id="dashboard-card-06" width="389" height="260"></canvas>
            </div>
            <div id="dashboard-card-06-legend" class="vc mh mp">
                <ul class="flex flex-wrap justify-center -m-1"></ul>
            </div>
        </div>
    </div>

    <!-- Table (Top Channels) -->
    <div class="tz tni bg-white bd rounded-sm border border-slate-200">
        <header class="vc vu cs ch">
            <h2 class="gh text-slate-800">Top Channels</h2>
        </header>
        <div class="dk">

            <!-- Table -->
            <div class="lf">
                <table class="ux ou">
                    <!-- Table header -->
                    <thead class="go gv gq hp rounded-sm">
                    <tr>
                        <th class="dx">
                            <div class="gh gt">Source</div>
                        </th>
                        <th class="dx">
                            <div class="gh gn">Visitors</div>
                        </th>
                        <th class="dx">
                            <div class="gh gn">Revenues</div>
                        </th>
                        <th class="dx">
                            <div class="gh gn">Sales</div>
                        </th>
                        <th class="dx">
                            <div class="gh gn">Conversion</div>
                        </th>
                    </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody class="text-sm gp le ln">
                    <!-- Row -->
                    <tr>
                        <td class="dx">
                            <div class="flex items-center">
                                <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                    <circle fill="#24292E" cx="18" cy="18" r="18"></circle>
                                    <path
                                        d="M18 10.2c-4.4 0-8 3.6-8 8 0 3.5 2.3 6.5 5.5 7.6.4.1.5-.2.5-.4V24c-2.2.5-2.7-1-2.7-1-.4-.9-.9-1.2-.9-1.2-.7-.5.1-.5.1-.5.8.1 1.2.8 1.2.8.7 1.3 1.9.9 2.3.7.1-.5.3-.9.5-1.1-1.8-.2-3.6-.9-3.6-4 0-.9.3-1.6.8-2.1-.1-.2-.4-1 .1-2.1 0 0 .7-.2 2.2.8.6-.2 1.3-.3 2-.3s1.4.1 2 .3c1.5-1 2.2-.8 2.2-.8.4 1.1.2 1.9.1 2.1.5.6.8 1.3.8 2.1 0 3.1-1.9 3.7-3.7 3.9.3.4.6.9.6 1.6v2.2c0 .2.1.5.6.4 3.2-1.1 5.5-4.1 5.5-7.6-.1-4.4-3.7-8-8.1-8z"
                                        fill="#FFF"></path>
                                </svg>
                                <div class="text-slate-800">Github.com</div>
                            </div>
                        </td>
                        <td class="dx">
                            <div class="gn">2.4K</div>
                        </td>
                        <td class="dx">
                            <div class="gn yt">$3,877</div>
                        </td>
                        <td class="dx">
                            <div class="gn">267</div>
                        </td>
                        <td class="dx">
                            <div class="gn yv">4.7%</div>
                        </td>
                    </tr>
                    <!-- Row -->
                    <tr>
                        <td class="dx">
                            <div class="flex items-center">
                                <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                    <circle fill="#1DA1F2" cx="18" cy="18" r="18"></circle>
                                    <path
                                        d="M26 13.5c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4 0 1.6 1.1 2.9 2.6 3.2-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H10c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4c.7-.5 1.3-1.1 1.7-1.8z"
                                        fill="#FFF" fill-rule="nonzero"></path>
                                </svg>
                                <div class="text-slate-800">Twitter</div>
                            </div>
                        </td>
                        <td class="dx">
                            <div class="gn">2.2K</div>
                        </td>
                        <td class="dx">
                            <div class="gn yt">$3,426</div>
                        </td>
                        <td class="dx">
                            <div class="gn">249</div>
                        </td>
                        <td class="dx">
                            <div class="gn yv">4.4%</div>
                        </td>
                    </tr>
                    <!-- Row -->
                    <tr>
                        <td class="dx">
                            <div class="flex items-center">
                                <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                    <circle fill="#EA4335" cx="18" cy="18" r="18"></circle>
                                    <path
                                        d="M18 17v2.4h4.1c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C21.6 11.7 20 11 18.1 11c-3.9 0-7 3.1-7 7s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H18z"
                                        fill="#FFF" fill-rule="nonzero"></path>
                                </svg>
                                <div class="text-slate-800">Google (organic)</div>
                            </div>
                        </td>
                        <td class="dx">
                            <div class="gn">2.0K</div>
                        </td>
                        <td class="dx">
                            <div class="gn yt">$2,444</div>
                        </td>
                        <td class="dx">
                            <div class="gn">224</div>
                        </td>
                        <td class="dx">
                            <div class="gn yv">4.2%</div>
                        </td>
                    </tr>
                    <!-- Row -->
                    <tr>
                        <td class="dx">
                            <div class="flex items-center">
                                <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                    <circle fill="#4BC9FF" cx="18" cy="18" r="18"></circle>
                                    <path
                                        d="M26 14.3c-.1 1.6-1.2 3.7-3.3 6.4-2.2 2.8-4 4.2-5.5 4.2-.9 0-1.7-.9-2.4-2.6C14 19.9 13.4 15 12 15c-.1 0-.5.3-1.2.8l-.8-1c.8-.7 3.5-3.4 4.7-3.5 1.2-.1 2 .7 2.3 2.5.3 2 .8 6.1 1.8 6.1.9 0 2.5-3.4 2.6-4 .1-.9-.3-1.9-2.3-1.1.8-2.6 2.3-3.8 4.5-3.8 1.7.1 2.5 1.2 2.4 3.3z"
                                        fill="#FFF" fill-rule="nonzero"></path>
                                </svg>
                                <div class="text-slate-800">Vimeo.com</div>
                            </div>
                        </td>
                        <td class="dx">
                            <div class="gn">1.9K</div>
                        </td>
                        <td class="dx">
                            <div class="gn yt">$2,236</div>
                        </td>
                        <td class="dx">
                            <div class="gn">220</div>
                        </td>
                        <td class="dx">
                            <div class="gn yv">4.2%</div>
                        </td>
                    </tr>
                    <!-- Row -->
                    <tr>
                        <td class="dx">
                            <div class="flex items-center">
                                <svg class="ub mr-2 _b" width="36" height="36" viewBox="0 0 36 36">
                                    <circle fill="#0E2439" cx="18" cy="18" r="18"></circle>
                                    <path
                                        d="M14.232 12.818V23H11.77V12.818h2.46zM15.772 23V12.818h2.462v4.087h4.012v-4.087h2.456V23h-2.456v-4.092h-4.012V23h-2.461z"
                                        fill="#E6ECF4"></path>
                                </svg>
                                <div class="text-slate-800">Indiehackers.com</div>
                            </div>
                        </td>
                        <td class="dx">
                            <div class="gn">1.7K</div>
                        </td>
                        <td class="dx">
                            <div class="gn yt">$2,034</div>
                        </td>
                        <td class="dx">
                            <div class="gn">204</div>
                        </td>
                        <td class="dx">
                            <div class="gn yv">3.9%</div>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Line chart (Sales Over Time) -->
    <div class="flex ak tz _c bg-white bd rounded-sm border border-slate-200">
        <header class="vc vu cs ch flex items-center">
            <h2 class="gh text-slate-800">Sales Over Time (all stores)</h2>
        </header>
        <div class="vc vo">
            <div class="flex flex-wrap fe aq">
                <div class="flex aj">
                    <div class="text-3xl font-bold text-slate-800 mr-2">$1,482</div>
                    <div class="text-sm gh ye vk hy rounded-full">-22%</div>
                </div>
                <div id="dashboard-card-08-legend" class="uw nq rt">
                    <ul class="flex flex-wrap justify-end"></ul>
                </div>
            </div>
        </div>
        <!-- Chart built with Chart.js 3 -->
        <!-- Check out src/js/components/dashboard-card-08.js for config -->
        <div class="uw">
            <!-- Change the height attribute to adjust the chart height -->
            <canvas id="dashboard-card-08" width="595" height="248"></canvas>
        </div>
    </div>

    <!-- Stacked bar chart (Sales VS Refunds) -->
    <div class="flex ak tz _c bg-white bd rounded-sm border border-slate-200">
        <header class="vc vu cs ch flex items-center">
            <h2 class="gh text-slate-800">Sales VS Refunds</h2>
            <div class="y nq" x-data="{ open: false }" @mouseenter="open = true"
                 @mouseleave="open = false">
                <button class="block" href="#0" aria-haspopup="true" :aria-expanded="open"
                        @focus="open = true" @focusout="open = false" @click.prevent="">
                    <svg class="oo sl du gq" viewBox="0 0 16 16">
                        <path
                            d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                    </svg>
                </button>
                <div class="tk g ti ts uz">
                    <div class="uo bg-white border border-slate-200 dk rounded bd la ru" x-show="open"
                         x-transition:enter="wt wa wr au" x-transition:enter-start="opacity-0 an"
                         x-transition:enter-end="ba uj" x-transition:leave="wt wa wr"
                         x-transition:leave-start="ba" x-transition:leave-end="opacity-0" x-cloak="">
                        <div class="text-sm">Sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit.
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="vc vo">
            <div class="flex aj">
                <div class="text-3xl font-bold text-slate-800 mr-2">+$6,796</div>
                <div class="text-sm gh ye vk hy rounded-full">-34%</div>
            </div>
        </div>
        <!-- Chart built with Chart.js 3 -->
        <!-- Check out src/js/components/dashboard-card-09.js for config -->
        <div class="uw">
            <!-- Change the height attribute to adjust the chart height -->
            <canvas id="dashboard-card-09" width="595" height="248"></canvas>
        </div>
    </div>

    <!-- Card (Recent Activity) -->
    <div class="tz tno bg-white bd rounded-sm border border-slate-200">
        <header class="vc vu cs ch">
            <h2 class="gh text-slate-800">Recent Activity</h2>
        </header>
        <div class="dk">

            <!-- Card content -->
            <!-- "Today" group -->
            <div>
                <header class="go gv gq hp rounded-sm gh dx">Today</header>
                <ul class="nm">
                    <!-- Item -->
                    <li class="flex vi">
                        <div class="op sv rounded-full ub ho ng ra">
                            <svg class="op sv du text-indigo-50" viewBox="0 0 36 36">
                                <path
                                    d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
                            </svg>
                        </div>
                        <div class="uw flex items-center cs ch text-sm vr">
                            <div class="uw flex fe">
                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Nick Mark</a>
                                    mentioned <a class="gp text-slate-800" href="#0">Sara Smith</a> in a
                                    new post
                                </div>
                                <div class="ub ls nq">
                                    <a class="gp text-indigo-500 xh" href="#0">View<span
                                            class="hidden _z"> -&gt;</span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Item -->
                    <li class="flex vi">
                        <div class="op sv rounded-full ub ha ng ra">
                            <svg class="op sv du yi" viewBox="0 0 36 36">
                                <path
                                    d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z"></path>
                            </svg>
                        </div>
                        <div class="uw flex items-center cs ch text-sm vr">
                            <div class="uw flex fe">
                                <div class="lo">The post <a class="gp text-slate-800" href="#0">Post
                                        Name</a> was removed by <a class="gp text-slate-800 xd"
                                                                   href="#0">Nick Mark</a></div>
                                <div class="ub ls nq">
                                    <a class="gp text-indigo-500 xh" href="#0">View<span
                                            class="hidden _z"> -&gt;</span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Item -->
                    <li class="flex vi">
                        <div class="op sv rounded-full ub hd ng ra">
                            <svg class="op sv du yr" viewBox="0 0 36 36">
                                <path
                                    d="M15 13v-3l-5 4 5 4v-3h8a1 1 0 000-2h-8zM21 21h-8a1 1 0 000 2h8v3l5-4-5-4v3z"></path>
                            </svg>
                        </div>
                        <div class="uw flex items-center text-sm vr">
                            <div class="uw flex fe">
                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Patrick
                                        Sullivan</a> published a new <a class="gp text-slate-800"
                                                                        href="#0">post</a></div>
                                <div class="ub ls nq">
                                    <a class="gp text-indigo-500 xh" href="#0">View<span
                                            class="hidden _z"> -&gt;</span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- "Yesterday" group -->
            <div>
                <header class="go gv gq hp rounded-sm gh dx">Yesterday</header>
                <ul class="nm">
                    <!-- Item -->
                    <li class="flex vi">
                        <div class="op sv rounded-full ub hv ng ra">
                            <svg class="op sv du yu" viewBox="0 0 36 36">
                                <path
                                    d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z"></path>
                            </svg>
                        </div>
                        <div class="uw flex items-center cs ch text-sm vr">
                            <div class="uw flex fe">
                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">240+</a> users
                                    have subscribed to <a class="gp text-slate-800" href="#0">Newsletter
                                        #1</a></div>
                                <div class="ub ls nq">
                                    <a class="gp text-indigo-500 xh" href="#0">View<span
                                            class="hidden _z"> -&gt;</span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Item -->
                    <li class="flex vi">
                        <div class="op sv rounded-full ub ho ng ra">
                            <svg class="op sv du text-indigo-50" viewBox="0 0 36 36">
                                <path
                                    d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
                            </svg>
                        </div>
                        <div class="uw flex items-center text-sm vr">
                            <div class="uw flex fe">
                                <div class="lo">The post <a class="gp text-slate-800" href="#0">Post
                                        Name</a> was suspended by <a class="gp text-slate-800 xd"
                                                                     href="#0">Nick Mark</a></div>
                                <div class="ub ls nq">
                                    <a class="gp text-indigo-500 xh" href="#0">View<span
                                            class="hidden _z"> -&gt;</span></a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- Card (Income/Expenses) -->
    <div class="tz tno bg-white bd rounded-sm border border-slate-200">
        <header class="vc vu cs ch">
            <h2 class="gh text-slate-800">Income/Expenses</h2>
        </header>
        <div class="dk">

            <!-- Card content -->
            <!-- "Today" group -->
            <div>
                <header class="go gv gq hp rounded-sm gh dx">Today</header>
                <ul class="nm">
                    <!-- Item -->
                    <li class="flex vi">
                        <div class="op sv rounded-full ub ha ng ra">
                            <svg class="op sv du yi" viewBox="0 0 36 36">
                                <path
                                    d="M17.7 24.7l1.4-1.4-4.3-4.3H25v-2H14.8l4.3-4.3-1.4-1.4L11 18z"></path>
                            </svg>
                        </div>
                        <div class="uw flex items-center cs ch text-sm vr">
                            <div class="uw flex fe">
                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Qonto</a>
                                    billing
                                </div>
                                <div class="ub li nq">
                                    <span class="gp text-slate-800">-$49.88</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Item -->
                    <li class="flex vi">
                        <div class="op sv rounded-full ub hd ng ra">
                            <svg class="op sv du yr" viewBox="0 0 36 36">
                                <path
                                    d="M18.3 11.3l-1.4 1.4 4.3 4.3H11v2h10.2l-4.3 4.3 1.4 1.4L25 18z"></path>
                            </svg>
                        </div>
                        <div class="uw flex items-center cs ch text-sm vr">
                            <div class="uw flex fe">
                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Cruip.com</a>
                                    Market Ltd 70 Wilson St London
                                </div>
                                <div class="ub li nq">
                                    <span class="gp yt">+249.88</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Item -->
                    <li class="flex vi">
                        <div class="op sv rounded-full ub hd ng ra">
                            <svg class="op sv du yr" viewBox="0 0 36 36">
                                <path
                                    d="M18.3 11.3l-1.4 1.4 4.3 4.3H11v2h10.2l-4.3 4.3 1.4 1.4L25 18z"></path>
                            </svg>
                        </div>
                        <div class="uw flex items-center cs ch text-sm vr">
                            <div class="uw flex fe">
                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Notion Labs
                                        Inc</a></div>
                                <div class="ub li nq">
                                    <span class="gp yt">+99.99</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Item -->
                    <li class="flex vi">
                        <div class="op sv rounded-full ub hd ng ra">
                            <svg class="op sv du yr" viewBox="0 0 36 36">
                                <path
                                    d="M18.3 11.3l-1.4 1.4 4.3 4.3H11v2h10.2l-4.3 4.3 1.4 1.4L25 18z"></path>
                            </svg>
                        </div>
                        <div class="uw flex items-center cs ch text-sm vr">
                            <div class="uw flex fe">
                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">Market Cap
                                        Ltd</a></div>
                                <div class="ub li nq">
                                    <span class="gp yt">+1,200.88</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Item -->
                    <li class="flex vi">
                        <div class="op sv rounded-full ub hu ng ra">
                            <svg class="op sv du gq" viewBox="0 0 36 36">
                                <path
                                    d="M21.477 22.89l-8.368-8.367a6 6 0 008.367 8.367zm1.414-1.413a6 6 0 00-8.367-8.367l8.367 8.367zM18 26a8 8 0 110-16 8 8 0 010 16z"></path>
                            </svg>
                        </div>
                        <div class="uw flex items-center cs ch text-sm vr">
                            <div class="uw flex fe">
                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">App.com</a>
                                    Market Ltd 70 Wilson St London
                                </div>
                                <div class="ub li nq">
                                    <span class="gp text-slate-800 bi">+$99.99</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Item -->
                    <li class="flex vi">
                        <div class="op sv rounded-full ub ha ng ra">
                            <svg class="op sv du yi" viewBox="0 0 36 36">
                                <path
                                    d="M17.7 24.7l1.4-1.4-4.3-4.3H25v-2H14.8l4.3-4.3-1.4-1.4L11 18z"></path>
                            </svg>
                        </div>
                        <div class="uw flex items-center text-sm vr">
                            <div class="uw flex fe">
                                <div class="lo"><a class="gp text-slate-800 xd" href="#0">App.com</a>
                                    Market Ltd 70 Wilson St London
                                </div>
                                <div class="ub li nq">
                                    <span class="gp text-slate-800">-$49.88</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>

</div>


