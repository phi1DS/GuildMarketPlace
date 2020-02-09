$(document).ready(function() {

    $currentElement = undefined;

    $('*[data-trigger="delete"]').click(function() {
        $currentElement = $(this);
        $('.ui.modal')
            .modal('show')
        ;
    });

    $('*[data-trigger="validate"]').click(function() {
        let redirectUrl = $currentElement.data('target');
        console.log('redirect to :'+redirectUrl);
        //window.location.replace(redirectUrl);
    });
});
