// // General js
//
// // screen-spinner
// const $spinner = $('#screen-spinner');
//
//
// // ajax setup
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
// })
//
// // js-choices
// const element = document.querySelector('.js-choices');
// const choicesSelect = new Choices('.js-choices-multiple', {
//     allowHTML: true,
//     removeItemButton: true,
//     duplicateItemsAllowed: false,
//     choices: [],
// }).setChoices(
//     [],
//     'value',
//     'label',
//     false
// );
// choicesSelect.passedElement.element.addEventListener(
//     'addItem',
//     function (event) {
//         document.getElementById('js-choices-message').innerHTML =
//             'You just added "' + event.detail.label + '"';
//     }
// );
// choicesSelect.passedElement.element.addEventListener(
//     'removeItem',
//     function (event) {
//         document.getElementById('js-choices-message').innerHTML =
//             'You just removed "' + event.detail.label + '"';
//     }
// );
//
//
// // tags
// const tagsUnique = new Choices('.js-choices-unique', {
//     allowHTML: true,
//     paste: false,
//     duplicateItemsAllowed: false,
//     editItems: true,
// });
//
// // unique slug
// let keyupTimer;
// function createUniqueSlug(target, $slug_input = null, route) {
//     let title = target.value;
//
//     $slug_input.addClass('bg-green-50');
//     clearTimeout(keyupTimer)
//     keyupTimer = setTimeout(function () {
//         const jqxhr = $.ajax({
//             url: route,
//             method: 'POST',
//             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//             data: {
//                 title: title
//             },
//             dataType: "HTMl"
//         });
//         jqxhr.done(function (response) {
//             $slug_input.val(response)
//         })
//         jqxhr.always(function (response) {
//             console.log(response)
//             $slug_input.removeClass('bg-green-50');
//         });
//     }, 600);
// }
// //window.createUniqueSlug = createUniqueSlug;
//
// export {createUniqueSlug};
//
//
// /*
// *
// *  Dynamic AJax Alerts
// * */
// function alertAjaxResponse(response) {
//     if (response === '' || response === undefined || response === 'undefined') return false;
//
//     const elAjaxAlertBlock = document.getElementById('ajax_alert_block');
//     if (elAjaxAlertBlock) elAjaxAlertBlock.remove();
//
//     $('body').append("<div id='ajax_alert_block'></div>");
//     $('#ajax_alert_block').html('').html(createJSAlertMarkup());
//
//
//     const $js_alert = $('.js_alert');
//     const $js_svg = $js_alert.find('.js_svg');
//     const $js_title = $js_alert.find('.js_title');
//     const $js_message = $js_alert.find('.js_message');
//     const $js_button = $js_alert.find('.js_button_dismiss');
//
//     $js_title.text('...')
//     $js_message.text('...')
//
//     if (response.hasOwnProperty('responseText')) {
//         response = JSON.parse(response.responseText);
//         if (response.success === false) {
//             $js_alert.addClass('invisible z-50 fixed bottom-0 right-0 mr-6 p-4 mb-4 border border-red-300 rounded-lg bg-red-50 dark:bg-red-200')
//             $js_svg.addClass('w-5 h-5 mr-2 text-red-900 dark:text-red-800')
//             $js_title.addClass('mb-0 text-lg font-medium text-red-900 dark:text-red-800')
//             $js_message.addClass('mt-2 mb-4 text-sm text-red-900 dark:text-red-800')
//             $js_button.addClass('text-red-900 bg-transparent border border-red-900 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-red-800 dark:text-red-800 dark:hover:text-white')
//
//             $js_title.text(response.message)
//
//             const errorObj = response.data;
//             let html = "<ul>";
//             Object.keys(errorObj).forEach(function(key) {
//                 //console.log(key, errorObj[key]);
//                 html+= `<li><span class="font-medium">${key}: </span>${errorObj[key]} </li>`
//             });
//             html+="</ul>";
//             $js_message.html(html)
//         }
//     }
//
//     if (response.success === false) {
//         $js_alert.addClass('invisible z-50 fixed bottom-0 right-0 mr-6 p-4 mb-4 border border-red-300 rounded-lg bg-red-50 dark:bg-red-200')
//         $js_svg.addClass('w-5 h-5 mr-2 text-red-900 dark:text-red-800')
//         $js_title.addClass('mb-0 text-lg font-medium text-red-900 dark:text-red-800')
//         $js_message.addClass('mt-2 mb-4 text-sm text-red-900 dark:text-red-800')
//         $js_button.addClass('text-red-900 bg-transparent border border-red-900 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-red-800 dark:text-red-800 dark:hover:text-white')
//
//         $js_title.text(response.message)
//
//         const errorObj = response.data;
//         let html = "<ul>";
//         Object.keys(errorObj).forEach(function(key) {
//             //console.log(key, errorObj[key]);
//             html+= `<li><span class="font-medium">${key}: </span>${errorObj[key]} </li>`
//         });
//         html+="</ul>";
//         $js_message.html(html)
//     }
//
//
//     if (response.success === true) {
//         $js_alert.addClass('invisible z-50 fixed bottom-0 right-0 mr-6 p-4 mb-4 border border-green-300 rounded-lg bg-green-50 dark:bg-green-200')
//         $js_svg.addClass('w-5 h-5 mr-2 text-green-700 dark:text-green-800')
//         $js_title.addClass('mb-0 text-lg font-medium text-green-700 dark:text-green-800')
//         $js_message.addClass('mt-2 mb-4 text-sm text-green-700 dark:text-green-800')
//         $js_button.addClass('text-green-700 bg-transparent border border-green-700 hover:bg-green-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-green-800 dark:text-green-800 dark:hover:text-white')
//
//         $js_title.text(response.message)
//
//         const successObj = response.data;
//         let html = "<ul>";
//         Object.keys(successObj).forEach(function(key) {
//             html+= `<li><span class="font-medium">${key}: </span>${successObj[key]} </li>`
//         });
//         html+="</ul>";
//         $js_message.html(html)
//     }
//
//     $js_alert.removeClass('invisible')
//
// }
//
// function createJSAlertMarkup() {
//     return `
//     <div id="js_alert" class="js_alert max-w-screen-sm z-50 fixed bottom-0 right-0 mr-6 p-4 mb-4 rounded-lg" role="alert">
//         <div class="flex items-center">
//             <svg aria-hidden="true" class="js_svg w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
//             <span class="sr-only">Info</span>
//             <h3 class="js_title mb-0 text-lg font-medium"></h3>
//         </div>
//         <div class="js_message mt-2 mb-4 text-sm"></div>
//         <div class="flex">
//             <button data-dismiss-target="#js_alert" aria-label="Close" type="button" class="js_button_dismiss text-white font-medium text-xs px-3 py-1.5 mr-2 text-center inline-flex rounded-lg items-center"
//              onclick="dismissJSAlert(this)">
//              Dismiss
//              </button>
//         </div>
//     </div>
//     `;
// }
//
// function prepareDangerAlert(response) {
//
// }
//
// function dismissJSAlert(target) {
//     $(target).parents('.js_alert').remove();
// }
//
// window.dismissJSAlert = dismissJSAlert;
// window.alertAjaxResponse = alertAjaxResponse;
//
// /*
// *
// *  END Dynamic AJax Alerts
// * */
//
//
//
// // END General js
