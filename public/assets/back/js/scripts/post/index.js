$(document).ready(function () {
    $('#data-table').DataTable({
        language: {
            url: '/assets/back/js/dtspanish.json',
        },
        columnDefs: [
            {
                orderable: false,
                targets: 'no-sort',
            },
            {
                searchable: false,
                targets: 'no-search',
            },
        ],
        order: [],
    });

    $('.mostrar-post').on('click', function (event) {
        event.preventDefault();
        const data = {
            _token: $('input[name=_token]').val()
        };
        ajaxRequest($(this).attr('href'), data, 'mostrar-post');
    });


    function ajaxRequest(url, data, accion) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                if (accion == 'mostrar-post') {
                    $('#modal-post .modal-body').html(respuesta);
                    $('#modal-post').modal('show');
                }
            },
            error: function (error) {
                if (error.status == 403) {
                            APP.notificacion('Error de seguridad, pongase en contacto con el Admin', 'Laravel blog', 'error');
                } else {
                    var errors = error.responseJSON.errors;
                    $.each(errors, function (key, val) {
                        $.each(val, function (key, mensaje) {
                            APP.notificacion(mensaje, 'Laravel blog', 'error');
                        });
                        return false;
                    });
                }

            },
        });
    }

});