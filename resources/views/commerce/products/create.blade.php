{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.products.store') }}" method="post" id="product_create_form" enctype="multipart/form-data" class="ajax_form" autocomplete="off">
        @csrf
        <input type="hidden" name="status" value="{{ \App\Helpers\Constant::PRODUCT_STATUS['published'] }}">

        <div class="lg:flex gap-3 mb-3">
            <div class="w-full lg:w-3/4 bg-white shadow-md sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">General</h1>
                    <span class="text-xs">To start selling, all you need is a name, price, and image</span>
                </div>
                <div class="relative mb-3">
                    <input type="text" id="title" name="title" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                    <label for="title" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Name</label>
                </div>
                <div class="relative mb-3">
                    <input type="text" name="slug" id="slug" class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                    <label for="slug" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Slug</label>
                </div>
                <div class="relative mb-3">
                    <textarea id="short_description" name="short_description" rows="4" class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" "></textarea>
                    <label for="short_description" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/4 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Short Description</label>
                </div>
            </div>
            <div class="w-full lg:w-1/4 bg-white shadow-md sm:rounded-lg border rounded-lg p-4">
                <div class="mb-4">
                    <label for="collection" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Collections</label>
                    <select name="collections[]" id="collections" multiple="multiple" class="select2 js-choices-multiple w-full p-1.5 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                        @if($collections)
                            @foreach($collections as $collection)
                                <option value="{{ $collection->id }}">{{ $collection->title }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div id="js-choices-message" class="message" style="display: none;"></div>
                </div>
                <div class="mb-4">
                    <label for="dropdownCategoriesButton" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Categories</label>
                    <button id="dropdownCategoriesButton" data-dropdown-toggle="dropdownCategories" class="w-full indigoBtn inline-flex items-center px-2.5 pb-2.5 pt-4 text-sm font-medium text-center text-gray-900 bg-transparent rounded-lg border border-1 border-gray-300 hover:bg-gray-100  focus:ring-indigo-500 focus:border-indigo-600 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800" type="button">
                        Choose Categories
                        <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownCategories" class="hidden z-10 w-60 bg-white rounded shadow-md border border-1 border-gray-300 dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 1310px);">
                        <div class="p-3">
                            <label for="input-group-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input type="text" id="input-group-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Search...">
                            </div>
                        </div>
                        <ul class="overflow-y-auto px-3 pb-3 h-48 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownCategoriesButton">
                            @if($categories)
                                @foreach($categories as $type)
                                    <li>
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <input id="label-{{$type->id}}" type="checkbox" value="{{ $type->id }}" name="categories[]" class="w-4 h-4 text-indigo-600 bg-gray-100 rounded border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="label-{{$type->id}}" class="ml-2 mb-0 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $type->title }}</label>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    {{--<select name="category" id="category" class="select2 w-full p-1.5 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                        @if($categories)
                            @foreach($categories as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        @endif
                    </select>--}}
                </div>
                <div class="mb-4">
                    <label for="tags" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Tags (separated by comma)</label>
                    <input type="text" id="tags" name="tags" class="js-choices-unique w-full text-gray-900 rounded-md focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <span class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Add Attributes</span>
                    <x-product-attribute-modal></x-product-attribute-modal>
                </div>
            </div>
        </div>

        <!-- Variants -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full lg:w-3/4 bg-white rounded-sm shadow-md sm:rounded-lg border rounded p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Variants</h1>
                    <span class="text-xs">Add variations of this product. Offer your customers different options for price, color, format, size, shape, etc.</span>
                </div>

            </div>
            <div class="w-full lg:w-1/4 bg-white rounded-sm shadow-md sm:rounded-lg border rounded p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Media</h1>
                    <span class="text-xs">Add images to your product</span>
                </div>
                <div class="mt-4 mb-2">
                    <!-- #singleMediaDropzoneModal is in component media-form-single-dropzone -->
                    <button type="button" data-modal-toggle="singleMediaDropzoneModal" class="text-sm px-5 py-2.5 text-center block w-full text-gray-700 bg-gray-100 border border-gray-300 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-indigo-600 font-medium rounded-lg dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Thumbnail
                    </button>
                </div>
                <div class="mt-4 mb-2">
                    <!-- #MultiMediaDropzoneModal is in component media-form-multiple-dropzone -->
                    <button type="button" data-modal-toggle="MultiMediaDropzoneModal" class="text-sm px-5 py-2.5 text-center block w-full text-gray-700 bg-gray-100 border border-gray-300 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-indigo-600 font-medium rounded-lg dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Upload Gallery
                    </button>
                </div>
            </div>
        </div>
        <!-- END Variants -->

        <!-- Stock & Inventory -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-md sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Stock & Inventory</h1>
                    <span class="text-xs">To start selling, all you need is a name, price, and image</span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5">General & Shipping</h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-2 content-start gap-x-2 mb-2.5 mt-2.5">
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="length" name="dimensions[length]" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="length"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Length</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="width" name="dimensions[width]" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="width"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Width</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="height" name="dimensions[height]" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="height" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Height</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="weight" name="weight" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="weight" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Weight (grams)</label>
                                </div>
                            </div>


                            <div class="mb-3 flex items-center block h-12 px-2.5 pb-2.5 pt-4 w-full rounded-lg border border-1 border-gray-300 appearance-none dark:border-gray-600">
                                <input id="featured" type="checkbox" name="featured" value="1" class="w-4 h-4 text-indigo-600 bg-gray-100 rounded border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="featured" class="py-3 ml-2 mb-0 w-full text-sm text-gray-500 dark:text-gray-300">featured</label>
                            </div>
                            <div class="mb-3 flex items-center block h-12 px-2.5 pb-2.5 pt-4 w-full rounded-lg border border-1 border-gray-300 appearance-none dark:border-gray-600">
                                <input id="new" type="checkbox" name="new" value="1" class="w-4 h-4 text-indigo-600 bg-gray-100 rounded border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="new" class="py-3 ml-2 mb-0 w-full text-sm text-gray-500 dark:text-gray-300">New</label>
                            </div>
                            <div class="mb-3 flex items-center block h-12 px-2.5 pb-2.5 pt-4 w-full rounded-lg border border-1 border-gray-300 appearance-none dark:border-gray-600">
                                <input id="sold_individual" type="checkbox" name="sold_individual" value="1" class="w-4 h-4 text-indigo-600 bg-gray-100 rounded border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="sold_individual" class="py-3 ml-2 mb-0 w-full text-sm text-gray-500 dark:text-gray-300">Sold Individual</label>
                            </div>

                        </div>

                        <div class="flex-1 grid grid-cols-2 gap-x-2 mb-2.5 content-start mt-2.5">
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="width" name="sku" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="sku" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">SKU</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="mid_code" name="mid_code" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="mid_code"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">MID Code</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="product_number" name="product_number" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="product_number"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Product Number</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="number" id="price" name="price" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="price" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Price</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="number" id="regular_price" name="regular_price" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="regular_price" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Regular Price</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="number" id="cost" name="cost" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="cost" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Cost</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="number" id="special_price" name="special_price" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="special_price" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Special Price</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="date" id="special_price_from" name="special_price_from" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="special_price_from" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Special Price From</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="date" id="special_price_to" name="special_price_to" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="special_price_to" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Special Price To</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5">Stock</h6></div> <!-- Stock -->
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid lg:grid-cols-5 gap-2" x-data="{ open: false }">
                            <div class="flex items-center block h-12 px-2.5 pb-2.5 pt-4 w-full rounded-lg border border-1 border-gray-300 appearance-none dark:border-gray-600">
                                <input id="manage_stock" type="checkbox" x-on:change="open = ! open" class="w-4 h-4 text-indigo-600 bg-gray-100 rounded border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="manage_stock" class="py-3 ml-2 mb-0 w-full text-sm text-gray-500 dark:text-gray-300">Manage Stock</label>
                            </div>
                            <div class="relative mb-3" x-show="open">
                                <input type="number" id="stock_quantity" name="stock_quantity" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                <label for="stock_quantity" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Stock Quantity</label>
                            </div>
                            <div class="relative mb-3" x-show="open">
                                <select name="backorders" id="backorders" class="w-full px-2.5 pb-2.5 pt-4 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                    <option value="no" selected="selected">Do not allow</option>
                                    <option value="notify">Allow, but notify customer</option>
                                    <option value="yes">Allow</option>
                                </select>
                                <label for="backorders" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Allow backorders?</label>
                            </div>
                            <div class="relative mb-3" x-show="open">
                                <input type="number" id="low_stock_amount" name="low_stock_amount" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" " />
                                <label for="low_stock_amount" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Low stock threshold</label>
                            </div>

                            <div class="relative mb-3">
                                <select name="stock_status" id="stock_status" class="w-full px-2.5 pb-2.5 pt-4 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                    <option value="instock" selected="selected">In stock</option>
                                    <option value="outofstock">Out of stock</option>
                                    <option value="onbackorder">On backorder</option>
                                </select>
                                <label for="stock_status" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Allow backorders?</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Stock & Inventory -->

        <!-- Description -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white shadow-md sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Description</h1>
                    <span class="text-xs">Detail about product</span>
                </div>
                <div class="mb-2 mt-2">
                    <div class="relative mb-3">
                        <label for="description" class="inter-base-semibold text-grey-90 mr-1.5">Description</label>
                        <textarea id="description" name="description" rows="10" class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600" placeholder=" "></textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Stock & Inventory -->

        <!-- submit -->
        <div class="lg:flex gap-3 mb-3 mt-20">
            <div class="w-full bg-white shadow-md sm:rounded-lg border rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Publish/Draft</h1>
                </div>
                <div class="mb-2 mt-2">
                    <input type="submit" value="Publish" class="flex items-center justify-center cursor-pointer bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-indigo-50 text-white font-semibold h-12 px-6 rounded-lg w-full sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400">
                </div>
            </div>
        </div>
        <!-- submit -->
    </form>

    <!-- dropzone form modal -->
    <x-media-form-multiple-dropzone />
    <x-media-form-single-dropzone />




    @push('before_body')
        <!-- dropzone assets -->
        <link rel="stylesheet" href="{{ asset("/plugins/dropzone@6.0.0-beta.2/dropzone.css") }}">
        <script src="{{ asset("plugins/dropzone@6.0.0-beta.2/dropzone-min.js") }}"></script>

        <link rel="stylesheet" href="{{ asset('/plugins/choicesjs@9.0.1/base.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('/plugins/choicesjs@9.0.1/choices.min.css') }}"/>
        <script src="{{ asset('plugins/choicesjs@9.0.1/choices.min.js') }}"></script>


        <style>
            .indigoBtn:focus {
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
            }
            .choices {}
            .choices__inner {
                border-radius: 0.5rem;
            }
            .choices__list--multiple {}
            .choices__list--multiple .choices__item {
                background-color: #6366F1;
                border: 1px solid #6366F1;
            }
            .choices[data-type*=select-multiple] .choices__button, .choices[data-type*=text] .choices__button {
                border-left: 1px solid #ffffff;
            }
            .choices__input {
                /*padding: 0.75rem 0.625rem 0.375rem;*/
                --tw-border-opacity: 1;
                border-color: rgb(209 213 219 / var(--tw-border-opacity));
                border-radius: 0.5rem;
                font-size: .875rem;
                line-height: 1.5715;
                box-shadow: none !important;
            }
            .selectize-control.multi .selectize-input > div.item {
                --tw-text-opacity: 1;
                color: rgb(17 24 39 / var(--tw-text-opacity));
            }
            .is-focused .choices__inner, .is-open .choices__inner {
                --tw-border-opacity: 1;
                --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/);
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: #1C64F2;
                border-radius: 0.5rem;
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
                border-color: #1C64F2;
            }
        </style>
    @endpush

    @push('js_after')
        <script type="module">

            import { createUniqueSlug, ajaxRequest } from "{{ asset('js/main.js') }}";

            $('#title, #slug').on("keyup", function () {
                let $slug_input = $('#slug');
                createUniqueSlug(this, $slug_input, "{{ route('admin.products.unique-slug') }}");
            });

            // js-choices
            const element = document.querySelector('.js-choices');
            const choicesSelect = new Choices('.js-choices-multiple', {
                allowHTML: true,
                removeItemButton: true,
                duplicateItemsAllowed: false,
                choices: [],
            }).setChoices(
                [],
                'value',
                'label',
                false
            );
            choicesSelect.passedElement.element.addEventListener(
                'addItem',
                function (event) {
                    document.getElementById('js-choices-message').innerHTML =
                        'You just added "' + event.detail.label + '"';
                }
            );
            choicesSelect.passedElement.element.addEventListener(
                'removeItem',
                function (event) {
                    document.getElementById('js-choices-message').innerHTML =
                        'You just removed "' + event.detail.label + '"';
                }
            );


            // tags
            const tagsUnique = new Choices('.js-choices-unique', {
                allowHTML: true,
                paste: false,
                duplicateItemsAllowed: false,
                editItems: true,
            });


        /*
        * Dropzone script
        * */
        // disable autodiscover
        Dropzone.autoDiscover = false;

        const $product_create_form = $('#product_create_form ');

            //const filesize = 5;
        const allowMaxFilesize = 5;
        const allowMaxFiles = 5;

        const myDropzone = new Dropzone("#mediaFormMultipleDropzone", {
            url: "{{ route('admin.upload-media') }}",
            method: "POST",
            paramName: "files",
            autoProcessQueue: false,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            maxFiles: allowMaxFiles,
            maxFilesize: allowMaxFilesize, // MB
            uploadMultiple: true,
            parallelUploads: 100, // use it with uploadMultiple
            createImageThumbnails: true,
            thumbnailWidth: 120,
            thumbnailHeight: 120,
            addRemoveLinks: true,
            timeout: 180000,
            dictRemoveFileConfirmation: "Are you Sure?", // ask before removing file
            // Language Strings
            dictFileTooBig: `File is to big. Max allowed file size is ${allowMaxFilesize}mb`,
            dictInvalidFileType: "Invalid File Type",
            dictCancelUpload: "Cancel",
            dictRemoveFile: "Remove",
            dictMaxFilesExceeded: `Only ${allowMaxFiles} files are allowed`,
            dictDefaultMessage: "Drop files here to upload",
        });

        myDropzone.on("addedfile", function(file) {
            //console.log(file);
        });

        myDropzone.on("removedfile", function(file) {
            // console.log(file);
        });

        // Add more data to send along with the file as POST data. (optional)
        /*myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("dropzone", "1"); // $_POST["dropzone"]
            formData.append("productId", "10"); // $_POST["productId"]
        });*/

        myDropzone.on("error", function(file, response) {
            console.log(response);
        });

        // on success
        myDropzone.on("successmultiple", function(file, response) {
            // get response from successful ajax request
            // response includes what you you return from php side
            console.log(response);
            $.each(response, function( key, value ) {
                $product_create_form.append('<input type="text" name="gallery[]" value="'+value.name+'">')
            });


            /* submit the form after images upload
            (if u want to submit rest of the inputs in the form)
            I have no other inputs so, I commented below line. */
            //document.getElementById("mediaFormMultipleDropzone").submit();
        });

        // button trigger for processingQueue
        const submitDropzone = document.getElementById("submit-dropzone");
        submitDropzone.addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();

            if (myDropzone.files !== "") {
                // console.log(myDropzone.files);
                myDropzone.processQueue();
            } else {
                // if no file submit the form
                document.getElementById("dropzone-form").submit();
            }
        });
        // multiple


        // single
        const singleDropzone = new Dropzone("#mediaFormSingleDropzone", {
            url: "{{ route('admin.upload-media') }}",
            method: "POST",
            paramName: "thumbnail",
            autoProcessQueue: false,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            maxFiles: 1,
            maxFilesize: allowMaxFilesize, // MB
            uploadMultiple: false,
            parallelUploads: 100, // use it with uploadMultiple
            createImageThumbnails: true,
            thumbnailWidth: 120,
            thumbnailHeight: 120,
            addRemoveLinks: true,
            timeout: 180000,
            dictRemoveFileConfirmation: "Are you Sure?", // ask before removing file
            // Language Strings
            dictFileTooBig: `File is to big. Max allowed file size is ${allowMaxFilesize}mb`,
            dictInvalidFileType: "Invalid File Type",
            dictCancelUpload: "Cancel",
            dictRemoveFile: "Remove",
            dictMaxFilesExceeded: `Only ${allowMaxFiles} files are allowed`,
            dictDefaultMessage: "Drop files here to upload",
        });

        singleDropzone.on("addedfile", function(file) {
            //console.log(file);
        });

        singleDropzone.on("removedfile", function(file) {
            // console.log(file);
        });

        // Add more data to send along with the file as POST data. (optional)
        /*singleDropzone.on("sending", function(file, xhr, formData) {
            formData.append("dropzone", "1"); // $_POST["dropzone"]
            formData.append("productId", "10"); // $_POST["productId"]
            formData.append("userId", "7"); // $_POST["productId"]
        });*/

        singleDropzone.on("error", function(file, response) {
            console.log(response);
        });

        // on success
        singleDropzone.on("success", function(file, response) {
            // get response from successful ajax request
            // response includes what you you return from php side
            console.log(response);
            $.each(response, function( key, value ) {
                $product_create_form.append('<input type="text" name="thumbnail" value="'+value.name+'">')
            });

            /* submit the form after images upload
            (if u want to submit rest of the inputs in the form)
            I have no other inputs so, I commented below line. */
            //document.getElementById("mediaFormMultipleDropzone").submit();
        });

        // button trigger for processingQueue
        const submitSingleDropzone = document.getElementById("submit-single-dropzone");
        submitSingleDropzone.addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();

            if (singleDropzone.files !== "") {
                // console.log(myDropzone.files);
                singleDropzone.processQueue();
            } else {
                // if no file submit the form
                document.getElementById("dropzone-single-form").submit();
            }
        });
        // single


            // create product js
            $(document).on('submit', '.ajax_form', function (e) {
                ajaxRequest(e);
            })

            // END create product js
        </script>
@endpush

@endsection


{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
