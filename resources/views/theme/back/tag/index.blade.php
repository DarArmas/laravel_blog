@extends('theme.back.app')
@section("titulo")
Tags
@endsection

@section("scripts")
<script src="{{asset("assets/back/js/scripts/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    @csrf
    <div class="col-lg-12">
        @if ($mensaje = session("mensaje"))
            <x-alert tipo="success" :mensaje="$mensaje"/>
        @endif
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="text-white float-left">Tags</h5>
                <a href="{{route('tag.crear')}}" class="btn btn-outline-light btn-sm float-right">Crear tag</a>
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
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>{{$tag->nombre}}</td>
                                    <td>{{$tag->slug}}</td>
                                    <td>
                                        <a href="{{route("tag.editar", $tag->id)}}" class="editar-registro" data-toggle="tooltip" title="Editar este registro">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('tag.eliminar', $tag->id)}}" class="form-eliminar d-inline" method="POST">
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