{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.dev --}}
@extends('layouts.dashboard')

@section('content')
    <div class="mb-6">
        <!-- Title -->
        <div class="sm:flex items-center justify-between mb-2">

            <!-- Left: Title -->
            <div class="ri _y">
                <h3 class="gu text-slate-800 font-bold">Collections</h3>
            </div>

            <!-- Right: Actions -->
            <div class="flex gap-2 justify-self-end">
                <!-- Search form -->
                <form method="get" action="" class="relative">
                    <label for="action-search" class="d">Search</label>
                    <input id="action-search" name="query" class="w-full rounded shadow-sm border border-gray-200 py-1.5 pl-10 pr-2.5 text-base text-slate-500 placeholder:text-slate-500" type="search" placeholder="Search by collections">
                    <button class="w-10 absolute right-0 left-0 top-0 bottom-0 float-left" type="submit" aria-label="Search">
                        <svg class="w-4 h-4 fill-gray-400  ml-3 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                            <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                        </svg>
                    </button>
                </form>

                <!-- Create collection modal button -->
                @include('commerce.collections._particles.create_modal')
            </div>

        </div>
    </div>
    <div class="bg-white bd rounded-sm mb-3">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg pb-6">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="pl-4 pr-1 py-1">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-4">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-4">
                        SLUG
                    </th>
                    <th scope="col" class="py-3 px-4">
                        DESCRIPTION
                    </th>
                    <th scope="col" class="py-3 px-4">
                        ACTIONS
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($collections as $collection)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="pl-4 pr-1 py-1 w-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="pl-4 pr-1 py-1 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $collection->title }}
                        </th>
                        <td class="pl-4 pr-1 py-1 text-xs">
                            {{ $collection->slug ?? 'N/A' }}
                        </td>
                        <td class="pl-4 pr-1 py-1 text-xs">
                            {{ $collection->description ?? 'N/A' }}
                        </td>
                        <td class="pl-4 pr-1 py-1">
                            <div class="flex">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('admin.collections.delete', $collection->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <input type="hidden" name="id" value="{{ $collection->id }}">
                                    <input type="submit" value="Delete" class="ml-2 font-medium text-red-600 dark:text-blue-500 hover:underline">
                                    {{--<a href="{{ route('admin.categories.delete', $category->id) }}" class="ml-2 font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>--}}
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            <nav class="flex justify-between items-center pt-4 px-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $collections->count() }}</span>
                    Total <span class="font-semibold text-gray-900 dark:text-white">{{ $collections->total() }}</span>
                </span>
                {!! $collections->links() !!}
            </nav>
        </div>
    </div>


    {{--@include('commerce.categories._particles.create_modal')--}}
@endsection



















{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
