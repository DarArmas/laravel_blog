<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success">
                <h5 class="text-white float-left">Editar categoria: {{$data->nombre}}</h5>
            </div>
            <form action="{{route("categoria.actualizar", $data->id)}}" id="form-general" class="form-horizontal" method="POST">
                @csrf @method('put')
                <div class="card-body">
                    @include("theme.back.categoria.form")
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-5">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>