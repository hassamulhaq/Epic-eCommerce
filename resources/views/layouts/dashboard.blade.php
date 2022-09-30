{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="{{ asset('/css/ui/style.css') }}" rel="stylesheet">
    @livewireStyles

    @stack('css_after')
    @stack('before_body')
</head>

<body class="gs bs hi g_" :class="{ 'sidebar-expanded': sidebarExpanded }"
      x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
      x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">

<script>
    if (localStorage.getItem('sidebar-expanded') === 'true') {
        document.querySelector('body').classList.add('sidebar-expanded');
    } else {
        document.querySelector('body').classList.remove('sidebar-expanded');
    }
</script>


<!-- loader -->
<x-screen-spinner />
<!-- /_loader -->


<!-- Page wrapper -->
<div class="flex ss la">
    <!-- Sidebar -->
    <div>
        <!-- Sidebar backdrop (mobile only) -->
        <div class="m w bg-slate-900 pu tb tex ted bz wr" :class="sidebarOpen ? 'ba' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak=""></div>

        <!-- Sidebar -->
        <div id="sidebar" class="h-screen bg-white flex flex-col overflow-y-auto bg-gray-0 border-r border-grey-20 py-4 px-4 g tb x k tea tec teh tts lp tth l or tej ttz 2xl:!w-64 ub _hs we wr wu"
             :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false"
             @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

            <!-- Sidebar header -->
            <div class="flex fe nx vq j_">
                <!-- Close button -->
                <button class="tex text-slate-500 xl" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar"
                        :aria-expanded="sidebarOpen">
                    <span class="d">Close sidebar</span>
                    <svg class="oi so du" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"></path>
                    </svg>
                </button>
                <!-- Logo -->
                <a class="block flex gap-2 items-center" href="{{ route('admin.dashboard') }}">
                    <svg width="32" height="32" viewBox="0 0 32 32">
                        <defs>
                            <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                                <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%"></stop>
                                <stop stop-color="#A5B4FC" offset="100%"></stop>
                            </linearGradient>
                            <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                                <stop stop-color="#38BDF8" stop-opacity="0" offset="0%"></stop>
                                <stop stop-color="#38BDF8" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                        <rect fill="#6366F1" width="32" height="32" rx="16"></rect>
                        <path
                            d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
                            fill="#4F46E5"></path>
                        <path
                            d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
                            fill="url(#logo-a)"></path>
                        <path
                            d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
                            fill="url(#logo-b)"></path>
                    </svg>
                    <span class="font-bold">Epic Ecommerce</span>
                </a>
            </div>
            <!-- /Sidebar header -->


            <!-- sidebar-menu -->
            <x-sidebar-menu></x-sidebar-menu>
            <!-- /sidebar-menu -->
        </div>

        <!-- Expand | collapse button -->
        <div class="mt hidden tew 2xl:hidden justify-end rn">
            <div class="vn vr">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="d">Expand / collapse sidebar</span>
                    <svg class="oi so du _o" viewBox="0 0 24 24">
                        <path class="gq"
                              d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"></path>
                        <path class="g_" d="M3 23H1V1h2z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- /Expand | collapse button -->
    </div>
    <!-- /Sidebar -->

    <!-- Content area -->
    <div class="y flex ak ug ll lc">

        <!-- Site header -->
        @include('layouts/header')

        <main>
            @include('_particles.flash_message')
            <!-- theme:classes "vs jj ttm vl ou uf na" -->
            <div class="vs jj ttm vl ou uf na">
                @yield('content')
            </div>
        </main>

    </div>

</div>


<script type="module" src="{{ asset('js/main.js') }}"></script>
@livewireScripts

@stack('js_after')
</body>
</html>

















{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
