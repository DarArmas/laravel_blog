$(document).ready(function(){
    $('#data-table').DataTable();

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
});