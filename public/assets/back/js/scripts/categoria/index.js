$(document).ready(function () {
    var tabla = $('#data-table').DataTable();
    //Proceso nuevo Registro
    $('#nuevo-registro').on('click', function (event) {
        event.preventDefault();
        const data = {
            _token: $('input[name=_token]').val()
        };
        ajaxRequest($(this).attr('href'), data, 'crear');
    });

    //Proceso Editar Registro
    $('#data-table').on('click', '.editar-registro', function (event) {
        event.preventDefault();
        const data = {
            _method: 'PUT',
            _token: $('input[name=_token]').val()
        };
        ajaxRequest($(this).attr('href'), data, 'editar');
    });

    //Proceso Eliminar Registro
    $('#data-table').on('submit', '.eliminar-registro', function (event) {
        event.preventDefault();
        const form = $(this);
        swal.fire({
            title: '¿ Seguro desea eliminar este registro ?',
            text: 'Confirmar acción',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Aceptar',
        }).then(function (result) {
            if (result.value) {
                ajaxRequest(form.attr('action'), form.serialize(), 'eliminar', form);
            }
        });
    });

    //Proceso Guardar o Actualizar
    $('#accion-categoria').on('submit', '#form-general', function (event) {
        event.preventDefault();
        const form = $(this);
        ajaxRequest(form.attr('action'), form.serialize(), 'guardar');
    });

    function ajaxRequest(url, data, accion, form) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (accion == 'crear' || accion == 'editar') {
                    $('#accion-categoria .modal-body').html(respuesta);
                    APP.validacionGeneral('form-general');
                    $('#accion-categoria').modal('show');
                } else if (accion == 'guardar' || accion == 'actualizar') {
                    APP.notificacion('Categoría creada y/o actualizada con exito', 'Laravel Blog', 'success');
                    tablaData(respuesta);
                } else if (accion == 'eliminar') {
                    if (respuesta.mensaje == 'ok') {
                        tabla.row(form.parents('tr')).remove().draw(false);
                        APP.notificacion('El registro se eliminó correctamente', 'Laravel Blog', 'success');
                    } else {
                        APP.notificacion('El registro no pudo ser eliminado, lo más seguro es que este siendo usado en otra tabla', 'Laravel Blog', 'error');
                    }
                }
            },
            error: function (error) {
                if (error.status == 403) {
                    APP.notificacion('Error de seguridad, pongase en contacto con el Admin', 'Laravel Blog', 'error');
                } else {
                    var errors = error.responseJSON.errors;
                    $.each(errors, function (key, val) {
                        $.each(val, function (key, mensaje) {
                            APP.notificacion(mensaje, 'Laravel Blog', 'error');
                        });
                        return false;
                    });
                }

            },
        });
    }

    function tablaData(respuesta) {
        tabla.destroy();
        $('#data-table tbody').html(respuesta);
        tabla = $('#data-table').DataTable();
        $('#accion-categoria').modal('hide');
    }
});