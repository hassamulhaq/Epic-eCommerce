<section>
    <div class="max-w-screen-xl px-4 py-8 mx-auto mb-40">
        <div>
            <span class="inline-block w-12 h-1 bg-indigo-500"></span>
            <h2 class="mt-1 text-2xl font-bold tracking-wide uppercase lg:text-3xl">
                Products
            </h2>
        </div>

        <div class="grid grid-cols-2 mt-8 lg:grid-cols-4 gap-x-4 gap-y-8">
        @foreach($products as $product)
                <div class="p-2 rounded-lg ease-in-out hover:bg-white duration-300 hover:drop-shadow-2xl border border-gray-50 hover:scale-105 hover:transition-all hover:z-10">
                    <a href="{{ route('product.product:slug', $product->slug) }}" class="block">
                        {{-- <div class="flex justify-center"><strong class="relative h-6 px-4 text-xs leading-6 text-white uppercase bg-black">New</strong></div> --}}
                        @if(!is_null($product->getMedia('thumbnail')->first()))
                            <img class="object-cover w-full md:h-40 lg:h-80" src="{{ $product->getMedia('thumbnail')->first()->getUrl() }}" alt="{{ $product->title }}">
                        @else
                            <img class="object-cover w-full md:h-40 lg:h-80" src="{{ asset(\App\Helpers\Constant::PLACEHOLDER_IMAGE['path']) }}" alt="{{ \App\Helpers\Constant::PLACEHOLDER_IMAGE['alt'] }}">
                        @endif
                        <div class="product-meta">
                            <a href="{{ route('product.product:slug', $product->slug) }}" class="mb-2">
                                <h2 class="loop-product__title mt-4 md:text-sm font-semibold text-black/90">{{ $product->title }}</h2>
                            </a>
                            <div class="price-hover-wrap mt-2">
                                <span class="price mt-4 font-semibold">
                                    <del aria-hidden="true" class="text-gray-300">
                                        <span class="price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">$</span>{{ $product->regular_price }}</bdi>
                                        </span>
                                    </del>
                                    <ins class="ml-1 no-underline">
                                        <span class="price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">$</span>{{ $product->price }}</bdi>
                                        </span>
                                    </ins>
                                </span>
                                <div class="product-add-to-cart mt-2" data-nectar-quickview="true">
                                    <a href="/cart/?add-to-cart={{ $product->id }}"
                                       data-quantity="1"
                                       class="add_to_cart_button ajax_add_to_cart bg-gray-100 p-1.5 rounded font-light"
                                       data-product_id="{{ $product->id }}"
                                       data-product_sku="{{ $product->sku }}"
                                       aria-label="Add “Beanie” to your cart"
                                       rel="nofollow">
                                        <i class="normal icon-cart"></i>
                                        <span>Add to cart</span>
                                    </a>
                                    <a class="quick_view no-ajaxy p-1.5 font-light" data-product-id="{{ $product->id }}">
                                        <i class="normal icon-eye"></i>
                                        <span>Quick View</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        @endforeach
        </div>

        <nav class="flex justify-between items-center pt-4 px-4 mt-6" aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $products->count() }}</span>
                Total <span class="font-semibold text-gray-900 dark:text-white">{{ $products->total() }}</span>
            </span>
            {!! $products->appends(['sort' => 'asc'])->links() !!}
        </nav>
    </div>
</section>
