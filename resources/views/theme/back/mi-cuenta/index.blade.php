@extends('theme.back.app')
@section('titulo')
Mi cuenta
@endsection

@section("styles")
<link href="{{asset("assets/back/extra-libs/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/back/extra-libs/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/back/extra-libs/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
@endsection

@section("scripts")
<script src="{{asset("assets/back/js/scripts/mi-cuenta/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-12">
        @if ($mensaje = session("mensaje"))
            <x-alert tipo="success" :mensaje="$mensaje"/>
        @endif
        @if ($errors->any())
            <x-alert tipo="danger" :mensaje="$errors"/>
        @endif
        <div class="card">
            <div class="card-header bg-success">
                <h5 class="text-white float-left">Mi cuenta</h5>
            </div>
            <form action="{{route("mi-cuenta.guardar")}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include("theme.back.mi-cuenta.form")
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection