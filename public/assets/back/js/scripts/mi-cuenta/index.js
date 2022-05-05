$(document).ready(function () {
    APP.validacionGeneral('form-general');
    $("#archivo").fileinput({
        overwriteInitial: true,
        language: 'es',
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="fas fa-folder-open"></i>',
        removeIcon: '<i class="fas fa-trash"></i>',
        removeTitle: 'Cancelar cambios',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="' + $("#img-preview").val() + '" alt="Su avatar">',
        layoutTemplates: { main2: '{preview} {remove} {browse}' },
        allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
    });
});