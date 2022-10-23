@extends('layouts.frontend')

@section('content')
    <section class="product-section">
        <div class="max-w-screen-xl px-4 py-8 mx-auto mb-40">
            <div class="flex mt-8 gap-y-8">
                <div class="w-3/5">
                    <div class="p-2 rounded-lg hover:drop-shadow-sm">
                        <div class="product-image-wrapper relative">
                            @if(!is_null($product->getMedia('thumbnail')->first()))
                                <img class="block rounded lightense" data-lightense-background="rgba(104,117,245,0.3)" src="{{ $product->getMedia('thumbnail')->first()->getUrl() }}" alt="{{ $product->title }}">
                                <div class="absolute top-2 left-2 z-10 bg-red-500 text-white px-1">{{ ($product->new) ? 'New' : '' }}</div>
                            @else
                                <img class="block rounded lightense" src="{{ asset(\App\Helpers\Constant::PLACEHOLDER_IMAGE['path']) }}" alt="{{ \App\Helpers\Constant::PLACEHOLDER_IMAGE['alt'] }}">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="w-2/5">
                    <div class="product-add-to-cart mt-2" data-quickview="true">
                        <div>
                            <span class="inline-block w-12 h-1 bg-indigo-500"></span>
                            <h1 class="mt-1 text-2xl font-bold tracking-wide uppercase">
                                {{ $product->title }}
                            </h1>
                        </div>
                        <div class="product-meta my-2">
                            <div class="price-hover-wrap mt-2">
                                <span class="price mt-4 font-semibold">
                                    <del aria-hidden="true" class="text-gray-300 text-xl">
                                        <span class="price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">
                                                    {{ !is_null($product->regular_price) ? __('$') : '' }}
                                                </span>
                                                {{ $product->regular_price ?? '' }}
                                            </bdi>
                                        </span>
                                    </del>
                                    <ins class="ml-1 no-underline text-2xl">
                                        <span class="price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">$</span>{{ $product->price }}</bdi>
                                        </span>
                                    </ins>
                                </span>
                            </div>
                            <div>
                                {{ $product->short_description }}
                            </div>
                        </div>
                        <div class="stock_wrapper">
                            @if(!is_null($product->stock_quantity))
                                <div class="p-1 bg-gray-300 text-white bg-green-400 inline-block text-sm rounded-sm">
                                    In Stock {{ $product->stock_quantity}}
                                </div>
                            @endif
                                @if($product->stock_status === \App\Helpers\ProductHelper::PRODUCT_STOCK_STATUS[1])
                                    <div class="p-1 bg-gray-300 text-white bg-red-700 inline-block text-sm rounded-sm">
                                        {{ Str::ucfirst(\App\Helpers\ProductHelper::PRODUCT_STOCK_STATUS['1']) }}
                                    </div>
                                @endif
                            @if($product->sold_individual)
                                <div class="p-1 bg-gray-300 text-white bg-green-400 inline-block text-sm rounded-sm">
                                    Sold Individual
                                </div>
                            @endif
                        </div>
                        <div class="flex items-center mt-6 mb-4">
                            <form id="wishlist-{{ $product->uuid }}" action="{{ route('customer.cart.add-to-cart') }}" method="post" enctype="multipart/form-data" class="ajax_form">
                                @csrf

                                <input type="hidden" name="product_uuid" value="{{ $product->uuid }}">
                                <div class="flex gap-2">
                                    @if(!$product->sold_individual)
                                        <div class="quantity-buttons flex justify-between bg-gray-50 border border-indigo-500 rounded-sm shadow-sm">
                                            <input type="button" value="-" class="minus-button cursor-pointer text-indigo-700 border-0 hover:bg-indigo-500 hover:text-white font-medium text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-indigo-800">
                                            <input type="number" id="quantity_{{ $product->uuid }}"
                                                   class="input-text qty border-0 w-28 focus:ring-0"
                                                   step="1" min="1" max="{{ $product->stock_quantity ?? 1 }}" name="quantity" value="1" title="Qty" size="4"
                                                   placeholder="" inputmode="numeric">
                                            <input type="button" value="+" class="plus-button cursor-pointer text-indigo-700 border-0 hover:bg-indigo-500 hover:text-white font-medium text-sm p-2.5 text-center inline-flex items-center dark:border-indigo-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-indigo-800">
                                        </div>
                                    @else
                                        <label><input type="hidden" name="quantity" value="1" step="1" min="1" max="1"></label>
                                    @endif

                                        <button type="submit"
                                            title="Add product to wishlist"
                                            data-quantity="1"
                                            class="add_to_cart_button ajax_add_to_cart capitalize bg-indigo-500 px-6 py-2.5 rounded-sm font-light text-white hover:bg-indigo-700 duration-300"
                                            data-product_uuid="{{ $product->uuid }}"
                                            data-product_sku="{{ $product->sku }}"
                                            aria-label="Add “Beanie” to your cart"
                                            rel="nofollow">
                                        <i class="normal icon-cart"></i>
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="product_meta text-sm py-1">
                            <div class="sku border-t-2 py-0.5">
                                SKU: {{ $product->sku }}
                            </div>
                            <div class="border-t-2 py-0.5">
                                {{ __('Category: ') }}
                                @if($product->relationLoaded('categories') && $product->categories->count()))
                                    @foreach($product->categories as $category)
                                        {{ $category->title }},
                                    @endforeach
                                @else
                                    {{ \App\Helpers\ProductHelper::UNCATEGORIZED_CATEGORY_TITLE }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('css_after')
        <style>
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                /* display: none; <- Crashes Chrome on hover */
                -webkit-appearance: none;
                margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
            }
            input[type=number] {
                -moz-appearance:textfield; /* Firefox */
            }
        </style>
    @endpush
    @push('js_after')
        <script type="module">
            import { ajaxRequest } from "{{ asset('js/main.js') }}";

            /**
             * Minus and Plus buttons to NUMBER type INPUTS
             */

            // Minus Button
            const plusButton = document.querySelectorAll(".plus-button");
            plusButton.forEach(function(btn) {
                btn.addEventListener('click', function(element) {
                    let inputNumber = this.previousElementSibling;
                    inputNumber.stepUp();
                    // trigger change event
                    let change = new Event("change");
                    inputNumber.dispatchEvent(change);
                })
            })

            // Minus Button
            const minusButton = document.querySelectorAll(".minus-button");
            minusButton.forEach(function(btn) {
                btn.addEventListener('click', function(element){
                    let inputNumber = this.nextElementSibling;
                    inputNumber.stepDown();
                    // trigger change event
                    let change = new Event("change");
                    inputNumber.dispatchEvent(change);
                })
            })

            window.addEventListener('load', function () {
                Lightense('img:not(.no-lightense), .lightense');
            }, false);

            $(document).on('submit', '.ajax_form', function (e) {
                ajaxRequest(e);
            })
        </script>
    @endpush
@endsection
