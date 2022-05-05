@php
$avatar = null;
$archivo = Auth::user()->archivo;
if ($archivo) {
    $imagen = $archivo->local ? asset("storage/$archivo->ruta") : Storage::disk('s3')->url($archivo->ruta);
} else {
    $imagen = "/assets/back/images/users/d2.jpg";
}
@endphp
<input type="hidden" id="img-preview" value="{{$imagen}}">
<div class="form-group row">
    <div class="col-sm-4 text-center">
        <div class="kv-avatar">
            <div class="file-loading">
                <input id="archivo" name="archivo" type="file" accept="image/*" required>
            </div>
        </div>
        <div class="kv-avatar-hint">
            <small>Seleccione archivo < 1500 KB</small>
        </div>
    </div>
</div>
<div id="kv-avatar-errors-1" class="text-center" style="display:none"></div>