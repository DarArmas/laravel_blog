//este archivo solo es de formulario, lo separo para que no este en js/laravel-blog.js y sea mas eficiente
$(document).ready(function(){
    APP.validacionGeneral('form-general');
    $('#icono').on('change', function(){
        $('#mostrar-icono').removeClass().addClass($(this).val());
    });
})