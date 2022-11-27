
{{--
$cartItems => relations:
    CartItemsWithProduct
        product
            productFlat
--}}

@php
    $cartItemsCount = (!is_null($cart) ? $cart->CartItemsWithProduct->count() : 0)
@endphp

<button id="dropdownCartButton" data-dropdown-toggle="dropdownNotification" class="inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400" type="button">
    <span class="whitespace-nowrap text-sm">CART ({{ $cartItemsCount }}) / {{ \App\Helpers\CartHelper::DEFAULT_CART_CURRENCY_CODE }} {{ $cart->grand_total ?? 0 }} </span>
    <img src="{{ asset('images/system/shopping-cart-svgrepo.svg') }}" alt="cart" class="h-6 md:h-8" aria-hidden="true" fill="currentColor">
    <div class="flex relative">
        <div class="inline-flex relative -top-2 right-3 w-3 h-3 bg-red-500 rounded-full border-2 border-white dark:border-gray-900"></div>
    </div>
</button>
<!-- Dropdown menu -->
<div id="dropdownNotification" class="hidden z-20 w-full max-w-sm bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-800 dark:divide-gray-700 border-2 border-indigo-600" aria-labelledby="dropdownCartButton" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 510px);">
    <div class="block py-2 px-4 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-white">
        Cart Items ({{ $cartItemsCount }})
    </div>
    <div class="divide-y divide-gray-100 dark:divide-gray-700 h-96 overflow-auto">

        @if(!is_null($cart))
            @foreach($cart->CartItemsWithProduct as $cartItemWithProduct)
                <a href="{{ route('products.product:slug', $cartItemWithProduct->product->productFlat->slug) }}" class="flex py-3 px-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="flex-shrink-0">
                        @if(!is_null($cartItemWithProduct->product->productFlat->getMedia('thumbnail')->first()))
                            <img class="w-11 h-11 rounded-full" src="{{ $cartItemWithProduct->product->productFlat->getMedia('thumbnail')->first()->getUrl() }}" alt="">
                        @else
                            <img class="w-11 h-11 rounded-full" src="{{ asset(\App\Helpers\Constant::PLACEHOLDER_IMAGE['path']) }}" alt="{{ \App\Helpers\Constant::PLACEHOLDER_IMAGE['alt'] }}">
                        @endif
                    </div>
                    <div class="pl-3 w-full">
                        <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">
                            {{ $cartItemWithProduct->product->productFlat->title }}
                            <span class="font-semibold text-gray-900 dark:text-white">
                            ({{ $cartItemWithProduct->quantity }})
                        </span>
                        </div>
                        <div class="text-xs text-blue-600 dark:text-blue-500">
                            view
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <form action="{{ route('customer.cart.remove-to-cart') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="cart_product_id" value="{{ $cartItemWithProduct->product_id }}">
                            <button type="submit" class="cursor-default p-1 text-red-700 hover:bg-red-300 rounded-full">X</button>
                        </form>
                    </div>
                </a>
            @endforeach
        @endif


    </div>
    <a href="{{ route('cart') }}" class="block py-2 text-sm font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
        <div class="inline-flex items-center ">
            <svg class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
            View all
        </div>
    </a>
</div>
