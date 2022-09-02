{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
@extends('layouts.dashboard')
@section('content')
    <div class="mb-6">
        <!-- Title -->
        <div class="sm:flex items-center justify-between mb-2">

            <!-- Left: Title -->
            <div class="ri _y">
                <h3 class="gu text-slate-800 font-bold">Products</h3>
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
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="pl-4 pr-1 py-1">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="py-3 pl-4">
                        📷
                    </th>
                    <th scope="col" class="py-3 px-4">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-4">
                        SKU
                    </th>
                    <th scope="col" class="py-3 px-4">
                        Stock
                    </th>
                    <th scope="col" class="py-3 px-4">
                        Price
                    </th>
                    <th scope="col" class="py-3 px-4">
                        Categories
                    </th>
                    <th scope="col" class="py-3 px-4">
                        Featured
                    </th>
                    <th scope="col" class="py-3 px-4">
                        Date
                    </th>
                    <th scope="col" class="py-3 px-4">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="pl-4 pr-1 py-1 w-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="pl-4 pr-1 py-1 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('images/ui/user-avatar-32.png') }}" alt="Jese image">
                    </th>
                    <th scope="row" class="pl-4 pr-1 py-1 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        MGTN_35654
                    </td>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        <span class="whitespace-nowrap bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">In stock</span>
                    </td>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        Accessories, Home and Kitchen
                    </td>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        $15.85
                    </td>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        ⭐
                    </td>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        <span class="">Published</span>
                        <span class="whitespace-nowrap">2022/08/21 at 8:47 am</span>
                    </td>
                    <td class="pl-4 pr-1 py-1">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="pl-4 pr-1 py-1 w-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="pl-4 pr-1 py-1 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('images/ui/user-avatar-32.png') }}" alt="Jese image">
                    </th>
                    <th scope="row" class="pl-4 pr-1 py-1 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        MGTN_35654
                    </td>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        <span class="whitespace-nowrap bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">In stock</span>
                    </td>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        Accessories, Home and Kitchen
                    </td>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        $15.85
                    </td>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        ⭐
                    </td>
                    <td class="pl-4 pr-1 py-1 text-xs">
                        <span class="">Published</span>
                        <span class="whitespace-nowrap">2022/08/21 at 8:47 am</span>
                    </td>
                    <td class="pl-4 pr-1 py-1">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <nav class="flex justify-between items-center pt-4 px-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                <ul class="inline-flex items-center -space-x-px">
                    <li>
                        <a href="#" class="block py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page" class="z-10 py-2 px-3 leading-tight text-blue-600 bg-blue-50 border border-blue-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
