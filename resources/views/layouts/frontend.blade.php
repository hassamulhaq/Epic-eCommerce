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
    @livewireStyles

    @stack('css_after')
    @stack('before_body')
</head>
<body class="antialiased">
    <!-- loader -->
    <x-screen-spinner/>
    <!-- /_loader -->


    <main>
        @include('_particles.flash_message')

        <x-frontend.header></x-frontend.header>

        <div class="container mx-auto">
            @yield('content')
        </div>
    </main>


@livewireScripts
@stack('js_after')
</body>
</html>
