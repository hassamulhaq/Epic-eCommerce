<button type="button" data-modal-toggle="addAttributeModal" class="text-sm px-5 py-2.5 text-center block w-full text-gray-700 bg-gray-100 border border-gray-300 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-indigo-600 font-medium rounded-lg dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
    Add Attributes
</button>

<div id="addAttributeModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="flex-1 text-xl font-semibold text-gray-900 dark:text-white">
                    Add Attributes
                </h3>

                <button type="button" id="attribute_js_btn" class="mx-2 text-gray-700 font-semibold px-6 py-2 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-0 rounded-lg w-full sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400">
                    Add
                </button>

                <button type="button" data-modal-toggle="addAttributeModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="px-6 py-4 space-y-4 h-96 overflow-auto">
                <table class="w-full">
                    <tbody id="attribute_js"></tbody>
                </table>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">

            </div>
        </div>
    </div>
</div>


@push('js_after')

    <script type="module">
        let $attribute_js = $('#attribute_js');
        let counter = 0;
        $('button#attribute_js_btn').click( function (e) {
            counter++;
            const html = `<tr id="row_${counter}" class="row">
                        <td>
                            <div class="relative mb-3">
                                <input type="text" id="attribute_name_${counter}" name="attribute[key][]" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" ">
                                <label for="attribute_name_${counter}" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Attribute Name</label>
                            </div>
                        </td>
                        <td>
                            <div class="relative mb-3">
                                <input type="text" id="attribute_value_${counter}" name="attribute[value][]" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:border-indigo-600 peer" placeholder=" ">
                                <label for="attribute_value_${counter}" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Attribute Value</label>
                            </div>
                        </td>
                        <td>
                            <div class="relative mb-3">
                                <button type="button" class="deleteRowBtn font-semibold h-12 px-3 text-gray-700 hover:text-white bg-gray-200 hover:bg-red-600 focus:outline-none focus:ring-0 rounded-lg w-full sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400">X</button>
                            </div>
                        </td>
                    </tr>`;

            $attribute_js.append(html);
        });

        $(document).on('click', '.deleteRowBtn', function() {
            $(this).parents('.row').remove();
        })
    </script>
@endpush
