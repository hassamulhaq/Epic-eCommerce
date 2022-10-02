@extends('layouts.frontend')

@section('content')
    <section class="product-section">
        <div class="max-w-screen-xl px-4 py-8 mx-auto mb-40">
            <div class="flex mt-8 gap-y-8">
                <div class="w-3/5">
                    <div class="p-2 rounded-lg hover:drop-shadow-sm">
                    @if(!is_null($product->getMedia('thumbnail')->first()))
                        <img class="object-cover w-full" src="{{ $product->getMedia('thumbnail')->first()->getUrl() }}" alt="{{ $product->title }}">
                    @else
                        <img class="object-cover w-full" src="{{ asset(\App\Helpers\Constant::PLACEHOLDER_IMAGE['path']) }}" alt="{{ \App\Helpers\Constant::PLACEHOLDER_IMAGE['alt'] }}">
                    @endif
                    </div>
                </div>
                <div class="w-2/5">
                    <div class="product-add-to-cart mt-2" data-quickview="true">
                        <div>
                            <span class="inline-block w-12 h-1 bg-indigo-500"></span>
                            <h1 class="mt-1 text-2xl font-bold tracking-wide uppercase lg:text-4xl">
                                {{ $product->title }}
                            </h1>
                        </div>
                        <div class="product-meta my-2">
                            <div class="price-hover-wrap mt-2">
                                <span class="price mt-4 font-semibold">
                                    <del aria-hidden="true" class="text-gray-300 text-xl">
                                        <span class="price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">$</span>{{ $product->regular_price }}</bdi>
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
                        <div class="flex items-center mt-6">
                            <form id="wishlist-{{ $product->id }}" action="{{ route('customer.wishlist.add-or-remove', $product->id) }}" method="post">
                                @csrf

                                <a href="javascript:void(0)"
                                   title="Add product to wishlist"
                                   data-quantity="1"
                                   class="add_to_cart_button ajax_add_to_cart capitalize bg-indigo-500 px-6 py-2.5 rounded font-light text-white hover:bg-indigo-700 duration-300"
                                   data-product_id="{{ $product->id }}"
                                   data-product_sku="{{ $product->sku }}"
                                   aria-label="Add “Beanie” to your cart"
                                   rel="nofollow"
                                   onclick="document.getElementById('wishlist-{{ $product->id }}').submit();">
                                    <i class="normal icon-cart"></i>
                                    <span>Add to cart</span>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
