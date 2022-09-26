// General js

// screen-spinner
const $spinner = $('#screen-spinner');


// ajax setup
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
})

// js-choices
const element = document.querySelector('.js-choices');
const choicesSelect = new Choices('.js-choices-multiple', {
    allowHTML: true,
    removeItemButton: true,
    duplicateItemsAllowed: false,
    choices: [],
}).setChoices(
    [],
    'value',
    'label',
    false
);
choicesSelect.passedElement.element.addEventListener(
    'addItem',
    function (event) {
        document.getElementById('js-choices-message').innerHTML =
            'You just added "' + event.detail.label + '"';
    }
);
choicesSelect.passedElement.element.addEventListener(
    'removeItem',
    function (event) {
        document.getElementById('js-choices-message').innerHTML =
            'You just removed "' + event.detail.label + '"';
    }
);


// tags
const tagsUnique = new Choices('.js-choices-unique', {
    allowHTML: true,
    paste: false,
    duplicateItemsAllowed: false,
    editItems: true,
});

// unique slug
let keyupTimer;
function createUniqueSlug(target, $slug_input = null, route) {
    let title = target.value;

    $slug_input.addClass('bg-green-50');
    clearTimeout(keyupTimer)
    keyupTimer = setTimeout(function () {
        const jqxhr = $.ajax({
            url: route,
            method: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                title: title
            },
            dataType: "HTMl"
        });
        jqxhr.done(function (response) {
            $slug_input.val(response)
        })
        jqxhr.always(function (response) {
            console.log(response)
            $slug_input.removeClass('bg-green-50');
        });
    }, 600);
}
// END General js
