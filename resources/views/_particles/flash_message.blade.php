@if ($message = Session::get('success'))
    <div class="fixed top-20 right-5 z-10" x-show="open" x-data="{ open: true }">
        <div class="inline-flex ut vs vr rounded-sm text-sm bg-white bd border border-slate-200 g_">
            <div class="flex ou fe aj">
                <div class="flex">
                    <svg class="oo sl ub du yt ie ra" viewBox="0 0 16 16">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z"></path>
                    </svg>
                    <div>{{ $message }}</div>
                </div>
                <button class="bc x_ ml-3 ie" @click="open = false">
                    <div class="d">Close</div>
                    <svg class="oo sl du">
                        <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="fixed top-20 right-5 z-10" x-show="open" x-data="{ open: true }">
        <div class="inline-flex ut vs vr rounded-sm text-sm bg-white bd border border-slate-200 g_">
            <div class="flex ou fe aj">
                <div class="flex">
                    <svg class="oo sl ub du yl ie ra" viewBox="0 0 16 16">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm3.5 10.1l-1.4 1.4L8 9.4l-2.1 2.1-1.4-1.4L6.6 8 4.5 5.9l1.4-1.4L8 6.6l2.1-2.1 1.4 1.4L9.4 8l2.1 2.1z"></path>
                    </svg>
                    <div>{{ $message }}</div>
                </div>
                <button class="bc x_ ml-3 ie" @click="open = false">
                    <div class="d">Close</div>
                    <svg class="oo sl du">
                        <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="fixed top-20 right-5 z-10" x-show="open" x-data="{ open: true }">
        <div class="inline-flex ut vs vr rounded-sm text-sm bg-white bd border border-slate-200 g_">
            <div class="flex ou fe aj">
                <div class="flex">
                    <svg class="oo sl ub du yn ie ra" viewBox="0 0 16 16">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
                    </svg>
                    <div>{{ $message }}</div>
                </div>
                <button class="bc x_ ml-3 ie" @click="open = false">
                    <div class="d">Close</div>
                    <svg class="oo sl du">
                        <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- End -->
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="fixed top-20 right-5 z-10" x-show="open" x-data="{ open: true }">
        <div class="inline-flex ut vs vr rounded-sm text-sm bg-white bd border border-slate-200 g_">
            <div class="flex ou fe aj">
                <div class="flex">
                    <svg class="oo sl ub du text-indigo-500 ie ra" viewBox="0 0 16 16">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm1 12H7V7h2v5zM8 6c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z"></path>
                    </svg>
                    <div>{{ $message }}</div>
                </div>
                <button class="bc x_ ml-3 ie" @click="open = false">
                    <div class="d">Close</div>
                    <svg class="oo sl du">
                        <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endif


@if ($errors->any())
    <div class="fixed top-20 right-5 z-10" x-show="open" x-data="{ open: true }">
        <div class="inline-flex ut vs vr rounded-sm text-sm bg-white bd border border-slate-200 g_">
            <div class="flex ou fe aj">
                <div class="flex">
                    <svg class="oo sl ub du yl ie ra" viewBox="0 0 16 16">
                        <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm3.5 10.1l-1.4 1.4L8 9.4l-2.1 2.1-1.4-1.4L6.6 8 4.5 5.9l1.4-1.4L8 6.6l2.1-2.1 1.4 1.4L9.4 8l2.1 2.1z"></path>
                    </svg>
                    {{--<div>{{ $message }}</div>--}}
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button class="bc x_ ml-3 ie" @click="open = false">
                    <div class="d">Close</div>
                    <svg class="oo sl du">
                        <path d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endif

{{--@if ($errors->any())
    <div class="text-red-600 text-sm">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif--}}


<!-- spatie:laravel-flash FlashServiceProvider -->
@if (flash()->message && flash()->level === 'info')
    <div id="alert-additional-content-1" class="{{ flash()->class }} px-4 py-2 mb-4 border border-blue-300 rounded-lg bg-blue-50 dark:bg-blue-300" role="alert">
        <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 mr-2 text-blue-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium text-blue-900">
                @if(flash()->level === 'info')
                    Info!
                @endif
            </h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-blue-900">
            {{ flash()->message }}
        </div>
        <div class="flex">
            <button type="button" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-800 dark:hover:bg-blue-900">
                <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                View more
            </button>
            <button type="button" class="text-blue-900 bg-transparent border border-blue-900 hover:bg-blue-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-blue-800 dark:text-blue-800 dark:hover:text-white" data-dismiss-target="#alert-additional-content-1" aria-label="Close">
                Dismiss
            </button>
        </div>
    </div>
@endif

@if (flash()->message && flash()->level === 'danger')
    <div id="alert-additional-content-2" class="alert-{{ flash()->class }} px-4 py-2 mb-4 border border-red-300 rounded-lg bg-red-50 dark:bg-red-200" role="alert">
        <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 mr-2 text-red-900 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium text-red-900 dark:text-red-800">
                @if(flash()->level === 'danger')
                    Error!
                @endif
            </h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-red-900 dark:text-red-800">
            {{ flash()->message }}
        </div>
        <div class="flex">
            <button type="button" class="text-red-900 bg-transparent border border-red-900 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-red-800 dark:text-red-800 dark:hover:text-white" data-dismiss-target="#alert-additional-content-2" aria-label="Close">
                Dismiss
            </button>
        </div>
    </div>
@endif


@if (flash()->message && flash()->level === 'success')
    <div id="alert-additional-content-3" class="{{ flash()->class }} px-4 py-2 mb-4 border border-green-300 rounded-lg bg-green-50 dark:bg-green-200" role="alert">
        <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 mr-2 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium text-green-700 dark:text-green-800">
                @if(flash()->level === 'success')
                    Success!
                @endif
            </h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-green-700 dark:text-green-800">
            {{ flash()->message }}
        </div>
        <div class="flex">
            <button type="button" class="text-green-700 bg-transparent border border-green-700 hover:bg-green-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-green-800 dark:text-green-800 dark:hover:text-white" data-dismiss-target="#alert-additional-content-3" aria-label="Close">
                Dismiss
            </button>
        </div>
    </div>
@endif


@if (flash()->message && flash()->level === 'warning')
    <div id="alert-additional-content-4" class="{{ flash()->class }} px-4 py-2 mb-4 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-yellow-200" role="alert">
        <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 mr-2 text-yellow-700 dark:text-yellow-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium text-yellow-700 dark:text-yellow-800">
                @if(flash()->level === 'warning')
                    Warning!
                @endif
            </h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-yellow-700 dark:text-yellow-800">
            {{ flash()->message }}
        </div>
        <div class="flex">
            <button type="button" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-yellow-800 dark:hover:bg-yellow-900">
                <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                View more
            </button>
            <button type="button" class="text-yellow-700 bg-transparent border border-yellow-700 hover:bg-yellow-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-yellow-800 dark:text-yellow-800 dark:hover:text-white" data-dismiss-target="#alert-additional-content-4" aria-label="Close">
                Dismiss
            </button>
        </div>
    </div>
@endif


@if (flash()->message && flash()->level === 'dark')
    <div id="alert-additional-content-5" class="{{ flash()->class }} px-4 py-2 mb-4 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-600 dark:bg-gray-700" role="alert">
        <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 mr-2 text-gray-700 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300">
                @if(flash()->level === 'dark')
                    Notification!
                @endif
            </h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-gray-700 dark:text-gray-300">
            {{ flash()->message }}
        </div>
        <div class="flex">
            <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-gray-600 dark:hover:bg-gray-500 dark:focus:ring-gray-600">
                <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                View more
            </button>
            <button type="button" class="text-gray-700 bg-transparent border border-gray-700 hover:bg-gray-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-gray-600 dark:hover:bg-gray-600 focus:ring-gray-600 dark:text-gray-300 dark:hover:text-white" data-dismiss-target="#alert-additional-content-5" aria-label="Close">
                Dismiss
            </button>
        </div>
    </div>

@endif
