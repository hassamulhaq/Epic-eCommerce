{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.products.store') }}" method="post" id="product_create" enctype="multipart/form-data" class="" autocomplete="off">
        @csrf
        <input type="hidden" name="status" value="draft">

        <div class="lg:flex gap-3 mb-3">
            <div class="w-full lg:w-3/4 bg-white rounded-sm shadow-md sm:rounded-lg border rounded p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">General</h1>
                    <span class="text-xs">To start selling, all you need is a name, price, and image</span>
                </div>
                <div class="relative mb-3">
                    <input type="text" id="name" name="name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                    <label for="name"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Name</label>
                </div>
                <div class="relative mb-3">
                    <input type="text" name="slug" id="slug" class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                    <label for="slug" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Slug</label>
                </div>
                <div class="relative mb-3">
                    <textarea id="short_description" name="short_description" rows="4" class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" "></textarea>
                    <label for="short_description" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/4 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Short Description</label>
                </div>
            </div>
            <div class="w-full lg:w-1/4 bg-white rounded-sm shadow-md sm:rounded-lg border rounded p-4">
                <div class="mb-4">
                    <label for="collection" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Collections</label>
                    <select name="collections[]" id="collections" multiple="multiple" class="select2 w-full p-1.5 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                        @if($collections)
                            @foreach($collections as $collection)
                                <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-4">
                    <label for="category" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Type</label>
                    <select name="category" id="category" class="select2 w-full p-1.5 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                        @if($categories)
                            @foreach($categories as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tags" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Tags (separated by comma)</label>
                    <input type="text" id="tags" name="tags" class="block p-2 w-full text-gray-900 rounded-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
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
                <div class="mb-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="thumbnail">Thumbnail</label>
                    <input type="file" aria-describedby="thumbnail" id="thumbnail" name="thumbnail" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                </div>
                <div class="mt-4 mb-2">
                    <button type="button" data-modal-toggle="defaultModal" class="text-sm px-5 py-2.5 text-center block w-full text-gray-700 bg-gray-100 border border-gray-300 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Upload Gallery
                    </button>
                </div>
            </div>
        </div>
        <!-- END Variants -->

        <!-- Stock & Inventory -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white rounded-sm shadow-md sm:rounded-lg border rounded p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Stock & Inventory</h1>
                    <span class="text-xs">To start selling, all you need is a name, price, and image</span>
                </div>
                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5">General & Shipping</h6></div>
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid grid-cols-2 gap-x-2 gap-y-4 mb-2.5 mt-2.5">
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="length" name="dimensions[length]" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="length"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Length</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="width" name="dimensions[width]" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="width"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Width</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="height" name="dimensions[height]" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="height" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Height</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="weight" name="weight" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="weight" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Weight (grams)</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 grid grid-cols-2 gap-x-2 gap-y-4 mb-2.5 mt-2.5">
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="width" name="sku" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="sku" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">SKU</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="text" id="mid_code" name="mid_code" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="mid_code"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">MID Code</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="number" id="price" name="price" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="price" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Price</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="relative">
                                    <input type="number" id="regular_price" name="regular_price" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
                                    <label for="regular_price" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Regular Price</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=""><h6 class="inter-base-semibold text-grey-90 mr-1.5">Stock</h6></div> <!-- Stock -->
                <div class="flex flex-col mb-2 mt-2">
                    <div class="md:flex lg:flex md:flex-1 lg:flex-1 md:gap-x-8 lg:gap-x-8">
                        <div class="flex-1 grid lg:grid-cols-5 gap-2" x-data="{ open: false }">
                            <div class="block h-12 px-2.5 pb-2.5 pt-4 w-full rounded-lg border border-1 border-gray-300 appearance-none dark:border-gray-600">
                                <input id="manage_stock" type="checkbox" x-on:change="open = ! open" class="w-4 h-4 text-indigo-600 bg-gray-100 rounded border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="manage_stock" class="py-3 ml-2 w-full text-sm text-gray-500 dark:text-gray-300">Manage Stock</label>
                            </div>
                            <div class="relative mb-3" x-show="open">
                                <input type="number" id="stock_quantity" name="stock_quantity" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
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
                                <input type="number" id="low_stock_amount" name="low_stock_amount" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " />
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
            <div class="w-full bg-white rounded-sm shadow-md sm:rounded-lg border rounded p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Description</h1>
                    <span class="text-xs">Detail about product</span>
                </div>
                <div class="mb-2 mt-2">
                    <div class="relative mb-3">
                        <textarea id="description" name="description" rows="10" class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" "></textarea>
                        <label for="description" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/4 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Description</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Stock & Inventory -->

        <!-- submit -->
        <div class="lg:flex gap-3 mb-3">
            <div class="w-full bg-white rounded-sm shadow-md sm:rounded-lg border rounded p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Publish/Draft</h1>
                </div>
                <div class="mb-2 mt-2">
                    <input type="submit" value="Publish" class="flex items-center justify-center bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-indigo-50 text-white font-semibold h-12 px-6 rounded-lg w-full sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400">
                </div>
            </div>
        </div>
        <!-- submit -->
    </form>




    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Upload Media
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="" method="post" id="dropzone_media_form" class="dropzone" enctype="multipart/form-data"></form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">

                </div>
            </div>
        </div>
    </div>



@push('before-body')
    <link rel="stylesheet" href="{{ asset("/plugins/dropzone@6.0.0-beta.2/dropzone.css") }}">
    <script src="{{ asset("plugins/dropzone@6.0.0-beta.2/dropzone-min.js") }}"></script>
@endpush


@push('js_after')
{{--    @vite(['resources/js/app.js']);--}}
<script>

    $('.select2').select2({
        placeholder: "Select Collection/s",
        allowClear: true
    });


    let dropzone = new Dropzone("#dropzone_media_form", {
        url: "{{ route('admin.upload-media') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        maxFiles: 5,
        acceptedFiles: ".jpeg,jpg,.png"
    });



</script>
@endpush

@endsection


{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
