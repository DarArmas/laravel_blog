$(document).ready(function () {
    $('.boton-reply').on('click', function (event) {
        event.preventDefault();
        $('.form-reply').hide();
        $(this).closest('.media').find('.form-reply').show();
    })
});
