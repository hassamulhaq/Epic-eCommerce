<x-guest-layout>
    <main class="bg-white">
        <div class="y flex">
            <!-- Content -->
            <div class="ou zi">

                <div class="on sh flex ak wl">

                    <!-- Header -->
                    <div class="ug">
                        <div class="flex items-center fe sa vs jj ttm">
                            <!-- Logo -->
                            <a class="block" href="/">
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
                            </a>
                        </div>
                    </div>

                    <div class="ul na vs vl">

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')"/>

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                        <h1 class="text-3xl text-slate-800 font-bold rh">Welcome back! ✨</h1>
                        <!-- Form -->
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf

                        <!-- Email Address -->
                            <div>
                                <x-label for="email" :value="__('Email')"/>
                                <x-input id="email" class="s ou block mt-1 w-full" type="email" name="email"
                                         :value="old('email')" required autofocus/>
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Password')"/>
                                <x-input id="password" class="s ou block mt-1 w-full"
                                         type="password"
                                         name="password"
                                         required autocomplete="current-password"/>
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                           name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4 fe rk">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                       href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <x-button class="ml-3 btn ho xi ye ml-3">
                                    {{ __('Log in') }}
                                </x-button>
                            </div>
                            <!-- Footer -->
                            <div class="mb rk co border-slate-200">
                                <div class="text-sm">
                                    Don’t you have an account?
                                    <a class="gp text-indigo-500 xh" href="{{ route('register') }}">Sign Up</a>
                                </div>
                                <!-- Warning -->
                                <div class="rw">
                                    <div class="hb ya vn vr rounded">
                                        <svg class="inline w-3 h-3 ub du" viewBox="0 0 12 12"><path d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z"></path></svg>
                                        <span class="text-sm">To support you during the pandemic super pro features are free until March 31st.</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div class="hidden qx g k te q zi" aria-hidden="true">
                <img class="dy db ou sh" src="{{ asset('/images/ui/login_bg.jpg') }}" width="760" height="1024"
                     alt="Authentication image">
                <img class="g tg x uz ig hidden tey" src="{{ asset('/images/ui/auth-decoration.png') }}" width="218"
                     height="224" alt="Authentication decoration">
            </div>

        </div>

    </main>
</x-guest-layout>
