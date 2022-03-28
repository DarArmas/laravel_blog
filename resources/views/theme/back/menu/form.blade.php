@if(!isset($data))
<div class="form-group row">
        <label for="nombre" class="col-sm-3 text-right control-label col-form-label requerido">Nombre</label>
        <div class="col-sm-5">
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{old("nombre")}}" maxlength="50" required>
        </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-3 text-right control-label col-form-label requerido">Url</label>
    <div class="col-sm-5">
        <input type="text" name="url" id="url" class="form-control" value="{{old("url")}}" maxlength="100" required>
    </div>
</div>
<div class="form-group row">
    <label for="icono" class="col-sm-3 text-right control-label col-form-label">Icono</label>
    <div class="col-sm-5">
        <input type="text" name="icono" id="icono" class="form-control" value="{{old("icono")}}" maxlength="50">
    </div>
    <div class="col-sm-1">
        <span id="mostrar-icono" class="{{old("icono")}}"></span>
    </div>
</div>
@else
<div class="form-group row">
    <label for="nombre" class="col-sm-3 text-right control-label col-form-label requerido">Nombre</label>
    <div class="col-sm-5">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$data->nombre}}" maxlength="50" required>
    </div>
</div>
<div class="form-group row">
<label for="url" class="col-sm-3 text-right control-label col-form-label requerido">Url</label>
<div class="col-sm-5">
    <input type="text" name="url" id="url" class="form-control" value="{{$data->url}}" maxlength="100" required>
</div>
</div>
<div class="form-group row">
<label for="icono" class="col-sm-3 text-right control-label col-form-label">Icono</label>
<div class="col-sm-5">
    <input type="text" name="icono" id="icono" class="form-control" value="{{$data->icono}}" maxlength="50">
</div>
<div class="col-sm-1">
    <span id="mostrar-icono" class="{{old("icono")}}"></span>
</div>
</div>
@endif