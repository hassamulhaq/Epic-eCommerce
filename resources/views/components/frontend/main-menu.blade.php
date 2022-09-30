<div class="lg:flex flex-1 items-center hidden">
    <div class="flex-1">
        <ul class="items-stretch space-x-3 lg:flex ml-6">
            <li class="flex">
                <a rel="noopener noreferrer" href="{{ route('home') }}" class="flex items-center px-4 -mb-1 border-b-2 border-transparent text-indigo-600 border-indigo-600">Home</a>
            </li>
            <li class="flex">
                <a rel="noopener noreferrer" href="{{ route('shop') }}" class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Shop</a>
            </li>
            <li class="flex">
                <a rel="noopener noreferrer" href="#" class="flex items-center px-4 -mb-1 border-b-2 border-transparent">Link</a>
            </li>
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
