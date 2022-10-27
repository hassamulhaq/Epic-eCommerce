@extends('layouts.frontend')

@section('content')
    <div class="wrapper lg:flex lg:gap-2 mt-3">
        <div class="px-2 my-2 w-full lg:w-3/5">
            <div class="py-4 px-3 overflow-x-auto relative shadow-md sm:rounded-lg">
                <form>
                    <div id="billing_wrapper">
                        <div class="grid gap-3 mb-2.5 md:grid-cols-2">
                            <div>
                                <label for="billing_first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First name</label>
                                <input type="text" id="billing_first_name" name="billing_first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                            </div>
                            <div>
                                <label for="billing_last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last name</label>
                                <input type="text" id="billing_last_name" name="billing_last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                            </div>
                            <div class="mb-2.5">
                                <label for="billing_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
                                <input type="text" id="billing_email" name="billing_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                            </div>
                            <div>
                                <label for="billing_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone number</label>
                                <input type="tel" id="billing_phone" name="billing_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                            </div>
                        </div>

                        <div class="mb-2.5">
                            <label for="billing_country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Country / Region</label>
                            <select id="billing_country" name="billing_country" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                <option value="" disabled selected>Choose</option>
                            </select>
                        </div>
                        <div class="mb-2.5">
                            <label for="billing_address_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Street address</label>
                            <div class="flex gap-3">
                                <div class="flex-1">
                                    <input type="text" id="billing_address_1" name="billing_address_1"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                           placeholder="">
                                </div>
                                <div class="flex-1">
                                    <label for="billing_address_2"></label>
                                    <input type="text" id="billing_address_2" name="billing_address_2"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                           placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="mb-2.5">
                            <label for="billing_city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Town / City</label>
                            <input type="text" id="billing_city" name="billing_city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                        </div>
                        <div class="mb-2.5">
                            <label for="billing_state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">State / County</label>
                            <input type="text" id="billing_state" name="billing_state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                        </div>

                        <div class="mb-2.5">
                            <label for="billing_postcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Postcode / ZIP</label>
                            <input type="text" id="billing_postcode" name="billing_postcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                        </div>
                    </div>

                    <div class="wrapper">
                        <!-- create an account -->
                        <div class="alpinejs_wrapper" x-data="{ open: false }">
                            <div class="flex items-start mb-2.5">
                                <div class="flex items-center h-5">
                                    <input type="checkbox" @click="open = !open" id="createaccount" name="createaccount" value="true" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-600 dark:ring-offset-gray-800" required="">
                                </div>
                                <label for="createaccount" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-400">Create an account?</label>
                            </div>
                            <div class="" x-show="open" x-transition>
                                <div class="flex gap-3">
                                    <div class="flex-1 mb-2.5">
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                                        <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                                    </div>
                                    <div class="flex-1 mb-2.5">
                                        <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm password</label>
                                        <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END create an account? -->

                        <!-- Ship to a different address? -->
                        <div class="alpinejs_wrapper" x-data="{ open: false }">
                            <div class="flex items-start mb-2.5">
                                <div class="flex items-center h-5">
                                    <input type="checkbox"  @click="open = !open" id="ship_to_different_address" name="ship_to_different_address" value="true" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-600 dark:ring-offset-gray-800" required="">
                                </div>
                                <label for="ship_to_different_address" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-400">Ship to a different address?</label>
                            </div>
                            <div id="shipping_wrapper" class="" x-show="open" x-transition>
                                <div class="grid gap-3 mb-2.5 md:grid-cols-2">
                                    <div>
                                        <label for="shipping_first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First name</label>
                                        <input type="text" id="shipping_first_name" name="shipping_first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                                    </div>
                                    <div>
                                        <label for="shipping_last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last name</label>
                                        <input type="text" id="shipping_last_name" name="shipping_last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                                    </div>
                                </div>

                                <div class="mb-2.5">
                                    <label for="shipping_country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Country / Region</label>
                                    <select id="shipping_country" name="shipping_country" class="select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                        <option value="" disabled selected>Choose</option>
                                    </select>
                                </div>
                                <div class="mb-2.5">
                                    <label for="shipping_address_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Street address</label>
                                    <div class="flex gap-3">
                                        <div class="flex-1">
                                            <input type="text" id="shipping_address_1" name="shipping_address_1"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                   placeholder="">
                                        </div>
                                        <div class="flex-1">
                                            <label for="shipping_address_2"></label>
                                            <input type="text" id="shipping_address_2" name="shipping_address_2"
                                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                                   placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-2.5">
                                    <label for="shipping_city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Town / City</label>
                                    <input type="text" id="shipping_city" name="shipping_city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                                </div>
                                <div class="mb-2.5">
                                    <label for="shipping_state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">State / County</label>
                                    <input type="text" id="shipping_state" name="shipping_state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                                </div>

                                <div class="mb-2.5">
                                    <label for="shipping_postcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Postcode / ZIP</label>
                                    <input type="text" id="shipping_postcode" name="shipping_postcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!-- Ship to a different address? -->
                    </div>

                </form>

            </div>
        </div>
        <div class="px-2 my-2 w-full lg:w-2/5">
            <div class="py-4 px-3 shadow-md border-2 border-gray-700">
                <div class="p-4 bg-gray-50">
                    <h2 class="font-bold">YOUR ORDER</h2>
                </div>
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
                        <td id="td_base_grand_total" class="px-2 py-2" align="right">{{ $cart->base_grand_total ?? 0 }}</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <th>
                        <tr>
                            <td class="px-2 py-2" colspan="2">
                                <div class="flex items-start mb-2.5">
                                    <div class="flex items-center h-5">
                                        <input id="remember" type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-indigo-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-600 dark:ring-offset-gray-800" required="">
                                    </div>
                                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-400">I agree with the <a href="#" class="text-indigo-600 hover:underline dark:text-indigo-500">terms and conditions</a>.</label>
                                </div>
                            </td>
                        </tr>
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
