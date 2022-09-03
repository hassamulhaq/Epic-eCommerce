{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
@extends('layouts.dashboard')
@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf

        <div class="lg:flex gap-3 mb-3">
            <div class="w-full lg:w-3/4 bg-white rounded-sm shadow-md sm:rounded-lg border rounded p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">General</h1>
                    <span class="text-xs">To start selling, all you need is a name, price, and image</span>
                </div>
                <div class="mb-2">
                    <label for="name" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                    <input type="text" id="name" name="name" class="block p-2 w-full text-gray-900 rounded-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                </div>
                <div class="mb-3">
                    <label for="slug" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Slug</label>
                    <input type="text" id="slug" name="slug" class="block sm:text-xs p-2 w-full text-gray-900 rounded-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                </div>
                <div class="mb-3">
                    <label for="short_description" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-400">Short Description</label>
                    <textarea id="short_description" name="short_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Short description of the product..."></textarea>
                </div>
            </div>
            <div class="w-full lg:w-1/4 bg-white rounded-sm shadow-md sm:rounded-lg border rounded p-4">
                <div class="mb-2">
                    <label for="collection" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Collection</label>
                    <input type="text" id="collection" name="collection" class="block p-2 w-full text-gray-900 rounded-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                </div>
                <div class="mb-2">
                    <label for="category" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Type</label>
                    <input type="text" id="category" name="category" class="block p-2 w-full text-gray-900 rounded-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                </div>
                <div class="mb-2">
                    <label for="tags" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Tags (separated by comma)</label>
                    <input type="text" id="tags" name="tags" class="block p-2 w-full text-gray-900 rounded-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                </div>
            </div>
        </div>

        <div class="lg:flex gap-3 mb-3">
            <div class="w-full lg:w-3/4 bg-white rounded-sm shadow-md sm:rounded-lg border rounded p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Variants</h1>
                    <span class="text-xs">Add variations of this product. Offer your customers different options for price, color, format, size, shape, etc.</span>
                </div>
                <div class="mb-2">
                    <label for="name" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                    <input type="text" id="name" name="name" class="block p-2 w-full text-gray-900 rounded-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                </div>
                <div class="mb-3">
                    <label for="slug" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-300">Slug</label>
                    <input type="text" id="slug" name="slug" class="block sm:text-xs p-2 w-full text-gray-900 rounded-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                </div>
                <div class="mb-3">
                    <label for="short_description" class="block mb-0.5 text-sm font-medium text-gray-900 dark:text-gray-400">Short Description</label>
                    <textarea id="short_description" name="short_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Short description of the product..."></textarea>
                </div>
            </div>
            <div class="w-full lg:w-1/4 bg-white rounded-sm shadow-md sm:rounded-lg border rounded p-4">
                <div class="mb-6">
                    <h1 class="text-2xl text-grey-90">Images</h1>
                    <span class="text-xs">Add images to your product</span>
                </div>
                <div class="mb-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="thumbnail">Thumbnail</label>
                    <input type="file" aria-describedby="thumbnail" id="thumbnail" name="thumbnail" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                </div>
                <div class="mb-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="gallery">Gallery</label>
                    <input type="file" multiple aria-describedby="gallery" id="gallery" name="gallery" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                </div>
            </div>
        </div>
    </form>
@endsection
{{-- https://github.com/hassamulhaq/Epic-eCommerce @devhassam https://hassam.me --}}
