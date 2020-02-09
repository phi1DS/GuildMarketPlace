$(document).ready(function() {
    function insertDynamicField() {
        let html = '<div class="field">';
        html += '<div class="inline field custom_form_object" data-type="base_object">';
        html += '<input type="number" class="trade-object" name="tradeObject[]" placeholder="Ex : 4851">';
        html += '<i class="close icon red custom_pointer" data-trigger="delete_dom_parent"></i>';
        html += '</div>';
        html += '</div>';

        $('*[data-type="object_field"]').append(html);
    }

    $('*[data-trigger="add_form_object"]').on('click', function (e) {
        e.preventDefault();

        insertDynamicField();
    });

    $('.field').on('click', 'i', () => {
        console.log('test');

        $(this).closest('.field').remove();
    });

    // $('form').on('submit', (event) => {
    //      event.preventDefault();
    //     //ajax pre request
    // })
});
