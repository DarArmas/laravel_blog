@extends('theme.back.app')
@section('titulo')
Sistema roles
@endsection

@section("scripts")
<script src="{{asset("assets/back/js/scripts/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-12">
        @if ($errors->any())
            <x-alert tipo="danger" :mensaje="$errors"/>
        @endif
        <div class="card">
            <div class="card-header bg-success">
                <h5 class="text-white float-left">Editar rol: {{$rol->nombre}}</h5>
                <a href="{{route('rol')}}" class="btn btn-outline-light btn-sm float-right">Volver al listado</a>
            </div>
            <form action="{{route("rol.actualizar", $rol)}}" id="form-general" class="form-horizontal" method="POST">
                @csrf @method('put')
                <div class="card-body">
                    @include("theme.back.rol.form")
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection