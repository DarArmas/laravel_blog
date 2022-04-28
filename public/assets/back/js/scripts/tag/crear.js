$(document).ready(function () {
    APP.validacionGeneral('form-general');
    $('#nombre').on('change', function () {
        const str = removeAccents($(this).val());
        $('#slug').val(str.toLowerCase().replace(/ /g, '-'));
    });

    $('#slug').on('change', function () {
        $(this).val($(this).val().toLowerCase().replace(/ /g, '-'));
    });

    const removeAccents = (str) => {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }
});