@extends('theme.back.app')
@section('titulo')
    Sistema Menús
@endsection

@section("scripts")
    <script src="{{asset("assets/back/js/pages/scripts/menu/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            @if($mensaje = session("mensaje"))
                <x-alert tipo="success" :mensaje="$mensaje"/>
            @endif
            @if($errors->any())
                <x-alert tipo="danger" :mensaje="$errors"/>
            @endif
            <div class="card">
                <div class="card-header bg-success">
                    <h5 class="text-white float-left">Guardar</h5>
                    <a href="{{route('menu')}}" class="btn btn-outline-light btn-sm float-right">Regresar a menus</a>
                </div>
                
                <form action="{{route('menu.guardar')}}" id="form-general" class="form-horizontal" method="POST">
                    @csrf
                    <div class="card-body">
                        @include('theme.back.menu.form')
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