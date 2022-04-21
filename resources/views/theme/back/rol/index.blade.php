@extends('theme.back.app')
@section("titulo")
Roles
@endsection

@section("scripts")
<script src="{{asset("assets/back/js/scripts/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @if ($mensaje = session("mensaje"))
            <x-alert tipo="success" :mensaje="$mensaje"/>
        @endif
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="text-white float-left">Roles</h5>
                <a href="{{route('rol.crear')}}" class="btn btn-outline-light btn-sm float-right">Crear rol</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>slug</th>
                                <th class="width40">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td>{{$rol->id}}</td>
                                    <td>{{$rol->nombre}}</td>
                                    <td>{{$rol->slug}}</td>
                                    <td>
                                        <a href="{{route("rol.editar", $rol)}}" data-toggle="tooltip" title="Editar este registro">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('rol.eliminar', $rol)}}" class="form-eliminar d-inline" method="POST">
                                            @csrf @method('delete')
                                            <button type="button" class="btn-accion-tabla boton-eliminar" data-toggle="tooltip" title="Eliminar este registro">
                                                <i class="text-danger fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection