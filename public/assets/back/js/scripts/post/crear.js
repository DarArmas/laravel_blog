$(document).ready(function () {
    APP.validacionGeneral('form-general');
    $('#categoria').select2({
        language: "es"
    });
    $('#tag').select2({
        language: "es",
        tags: true,
        tokenSeparators: [',']
    });
    $('#titulo').on('change', function () {
        const str = removeAccents($(this).val());
        $('#slug').val(str.toLowerCase().replace(/ /g, '-'));
    });
    $('#slug').on('change', function () {
        $(this).val($(this).val().toLowerCase().replace(/ /g, '-'));
    });
    $('#imagen').fileinput({
        language: 'es',
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        maxFileSize: 1000,
        showUpload: false,
        showClose: false,
        dropZoneEnabled: false,
        showCaption: false,
        showCancel: false,
        initialPreviewAsData: true,
        theme: "fas",
    });
    //var toolbarOptions = ['bold', 'italic', 'underline', 'strike'];
    var quill = new Quill('#contenido', {
        theme: 'snow',
        /* modules: {
            toolbar: toolbarOptions
        } */
    });

    quill.on('editor-change', function (eventName) {
        $('#contenido-field').val(quill.root.innerHTML);
    });

    const removeAccents = (str) => {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }
});