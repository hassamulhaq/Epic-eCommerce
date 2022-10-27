@extends('layouts.frontend')

@section('content')
    <div class="wrapper flex gap-2 mt-3">
        <div class="w-3/5">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">Product</th>
                        <th scope="col" class="p-4">Price</th>
                        <th scope="col" class="p-4">Quantity</th>
                        <th scope="col" class="p-4">Base Total</th>
                        <th scope="col" class="p-4">Total</th>
                        <th scope="col" class="p-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!is_null($cart))
                        @foreach($cart->CartItemsWithProduct as $cartItemWithProduct)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="py-2 px-2 font-medium text-gray-900 dark:text-white">
                                    <div class="flex flex-1 items-center gap-2 w-60">
                                        @if(!is_null($cartItemWithProduct->product->productFlat->getMedia('thumbnail')->first()))
                                            <img class="w-11 h-11 rounded-full"
                                                 src="{{ $cartItemWithProduct->product->productFlat->getMedia('thumbnail')->first()->getUrl() }}"
                                                 alt="">
                                        @else
                                            <img class="w-11 h-11 rounded-full"
                                                 src="{{ asset(\App\Helpers\Constant::PLACEHOLDER_IMAGE['path']) }}"
                                                 alt="{{ \App\Helpers\Constant::PLACEHOLDER_IMAGE['alt'] }}">
                                        @endif

                                        <a href="{{ route('products.product:slug', $cartItemWithProduct->product->productFlat->slug) }}"
                                           class="">
                                            {{ $cartItemWithProduct->product->productFlat->title }}
                                        </a>
                                    </div>
                                </th>
                                <td class="py-2 px-2">
                                    {{ $cartItemWithProduct->product->productFlat->price }}
                                </td>
                                <td class="py-2 px-2">
                                    {{ $cartItemWithProduct->quantity }}
                                </td>
                                <td class="py-2 px-2">
                                    {{ $cartItemWithProduct->base_total }}
                                </td>
                                <td class="py-2 px-2">
                                    {{ __('-') }}
                                </td>
                                <td class="py-2 px-2">
                                    <form action="{{ route('customer.cart.remove-to-cart') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="cart_product_id"
                                               value="{{ $cartItemWithProduct->product_id }}">
                                        <button type="submit"
                                                class="w-10 h-10 cursor-pointer p-1 text-red-700 hover:bg-red-300 rounded-full">
                                            X
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-2/5">
            <div class="shadow-md sm:rounded-lg">
                <div class="p-4 bg-gray-50">CART TOTALS</div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 p-4">
                    <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-0 dark:hover:bg-gray-600">
                        <th scope="row" class="py-2 px-2 font-medium text-gray-900 dark:text-white">
                            Subtotal
                        </th>
                        <td class="py-2 px-2" align="right">
                            {{ \App\Helpers\CartHelper::DEFAULT_CART_CURRENCY_CODE }} 10,000
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-0 dark:hover:bg-gray-600">
                        <td class="js_td py-2 px-2" colspan="2">
                            <table id="js_shipping_method" class="w-full">
                                <tbody>
                                <tr>
                                    <th colspan="2" class="font-medium text-gray-900 dark:text-white">Shipping</th>
                                </tr>
                                <tr>
                                    <td class="block" colspan="2">
                                        <ul id="shipping_method" class="shipping_methods grid gap-6 w-full md:grid-cols-2">
                                            <li>
                                                <input type="radio"
                                                       id="hosting-small"
                                                       name="shipping_method[]"
                                                       data-index="0"
                                                       value="free_shipping-small"
                                                       class="hidden peer" checked>
                                                <label for="hosting-small" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-indigo-500 peer-checked:border-indigo-600 peer-checked:text-indigo-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                    <div class="block">
                                                        <div class="w-full text-lg font-semibold">
                                                            <bdi><span class="currencySymbol">{{ \App\Helpers\CartHelper::DEFAULT_CART_CURRENCY_CODE }}</span> {{ \App\Helpers\CartHelper::DEFAULT_FREE_SHIPPING_RATE }}</bdi>
                                                        </div>
                                                        <div class="w-full">Free Shipping Rate</div>
                                                    </div>
                                                    <svg aria-hidden="true" class="ml-3 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio"
                                                       id="hosting-big"
                                                       name="shipping_method[]"
                                                       data-index="1"
                                                       value="free_shipping"
                                                       class="hidden peer">
                                                <label for="hosting-big" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-indigo-500 peer-checked:border-indigo-600 peer-checked:text-indigo-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                    <div class="block">
                                                        <div class="w-full text-lg font-semibold">
                                                            <bdi><span class="currencySymbol">{{ \App\Helpers\CartHelper::DEFAULT_CART_CURRENCY_CODE }}</span> {{ \App\Helpers\CartHelper::DEFAULT_FLAT_SHIPPING_RATE }}</bdi>
                                                        </div>
                                                        <div class="w-full">Flat Shipping Rate</div>
                                                    </div>
                                                    <svg aria-hidden="true" class="ml-3 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                </label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-0 dark:hover:bg-gray-600">
                        <td class="px-2 py-2">Total (Grand Total)</td>
                        <td id="td_base_grand_total" class="px-2 py-2"
                            align="right">{{ $cart->base_grand_total ?? 0 }}</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <th>
                        <tr>
                            <td class="px-2 py-2" colspan="2" align="center">
                                <a href="{{ route('checkout') }}" type="button"
                                   class="block w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-0 focus:outline-none font-medium rounded-lg px-5 py-2.5 text-center dark:focus:ring-white mr-2 mb-2">
                                    Proceed to checkout
                                </a>
                            </td>
                        </tr>
                    </th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
