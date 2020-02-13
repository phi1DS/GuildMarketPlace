$(document).ready(function() {
    function insertDynamicField() {
        let html = '<div class="field">';
        html += '<div class="inline field custom_form_object" data-type="base_object">';
        html += '<input type="number" class="trade-object" name="tradeObject[]" placeholder="Wowhead id">';
        html += '<input type="number" class="trade-object" name="tradeObjectQuantity[]" placeholder="Quantity">';
        html += '<i class="close icon red custom_pointer" data-trigger="delete_dom_parent"></i>';
        html += '</div>';
        html += '</div>';

        $('.field[data-type="object_field"]').append(html);
    }

    $('*[data-trigger="add_form_object"]').on("click", function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();

        insertDynamicField();
    });

    $('.field[data-type="object_field"]').on("click", '*[data-trigger=\"delete_dom_parent\"]', function(e){
        e.preventDefault();

        $(this).parent('.field').remove();
    })
});
