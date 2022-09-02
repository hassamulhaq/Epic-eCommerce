{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
@extends('layouts.dashboard')
@section('content')
    <div class="mb-6">
        <!-- Title -->
        <div class="sm:flex items-center justify-between mb-2">

            <!-- Left: Title -->
            <div class="ri _y">
                <h3 class="gu text-slate-800 font-bold">Create New Product</h3>
            </div>

            <!-- Right: Actions -->
            <div class="flex gap-2 justify-self-end">
                <!-- Search form -->
                <form method="get" action="" class="relative">
                    <label for="action-search" class="d">Search</label>
                    <input id="action-search" name="query" class="w-full rounded shadow-sm border border-gray-200 py-1.5 pl-10 pr-2.5 text-base text-slate-500 placeholder:text-slate-500" type="search" placeholder="Search by product">
                    <button class="w-10 absolute right-0 left-0 top-0 bottom-0 float-left" type="submit" aria-label="Search">
                        <svg class="w-4 h-4 fill-gray-400  ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                            <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                        </svg>
                    </button>
                </form>
                <!-- Create product button -->
                <a href="{{ route('admin.products.create') }}" class="btn ho xi ye">
                    <svg class="oo sl du bf ub" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"></path>
                    </svg>
                    <span class="hidden trm nq">Create Product</span>
                </a>
            </div>

        </div>
    </div>
    <div class="bg-white bd rounded-sm mb-3">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg pb-6">

        </div>
    </div>
@endsection
{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
