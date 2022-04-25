<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success">
                <h5 class="text-white float-left">Crear categoría</h5>
            </div>
            <form action="{{route("categoria.guardar")}}" id="form-general" class="form-horizontal" method="POST">
                @csrf
                <div class="card-body">
                    @include("theme.back.categoria.form")
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-5">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>