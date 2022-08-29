@if ($message = Session::get('success'))
    <div class="fixed top-20 right-5" x-show="open" x-data="{ open: true }">
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
    <div class="fixed top-20 right-5" x-show="open" x-data="{ open: true }">
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
    <div class="fixed top-20 right-5" x-show="open" x-data="{ open: true }">
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
    <div class="fixed top-20 right-5" x-show="open" x-data="{ open: true }">
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
    <div class="fixed top-20 right-5" x-show="open" x-data="{ open: true }">
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
