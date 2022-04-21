$(document).ready(function(){
    var form; 
    $('#nestable').nestable().on('change', function(){
        const data = {
            menu: window.JSON.stringify($('#nestable').nestable('serialize')),
            _token: $('input[name=_token]').val()
        };
        $.ajax({
            url: '/admin-backend/menu/guardar-orden',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function(respuesta){
            }
        });
    });

    $('.boton-eliminar').on('click', function(event){
        event.preventDefault();
        form = $(this).parents('form:first');
        $('#confirmar-eliminar').modal('show');
    });

    $('#accion-eliminar').on('click', function(event){
        event.preventDefault();
        $('#confirmar-eliminar').modal('hide');
        form.submit();
    });

    $('#nestable').nestable('expandAll');


});