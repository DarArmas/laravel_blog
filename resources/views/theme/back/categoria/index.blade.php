@extends('theme.back.app')
@section("titulo")
Categorias
@endsection

@section("scripts")
<script src="{{asset("assets/back/js/scripts/categoria/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    @csrf
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="text-white float-left">Categorias</h5>
                <a href="{{route('categoria.crear')}}" id="nuevo-registro" class="btn btn-outline-light btn-sm float-right">Crear categoría</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th class="width40">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include("theme.back.categoria.tabla-data")
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="accion-categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"></div>
        </div>
    </div>
</div>
@endsection