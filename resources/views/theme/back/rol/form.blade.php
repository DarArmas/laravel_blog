<div class="form-group row">
    <label for="nombre" class="col-sm-3 text-right control-label col-form-label requerido">Nombre</label>
    <div class="col-sm-5">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old("nombre", $rol->nombre ?? "")}}" maxlength="50" required>
    </div>
</div>
<div class="form-group row">
    <label for="slug" class="col-sm-3 text-right control-label col-form-label requerido">Slug</label>
    <div class="col-sm-5">
        <input type="text" name="slug" id="slug" class="form-control" value="{{old("slug", $rol->slug ?? "")}}" maxlength="50" required>
    </div>
</div>