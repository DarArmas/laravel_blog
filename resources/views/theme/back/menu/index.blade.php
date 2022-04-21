@extends('theme.back.app')

@section("titulo")
Menú
@endsection

@section("styles")
<link href="{{asset("assets/back/extra-libs/nestable/jquery.nestable.css")}}" rel="stylesheet">
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/back/extra-libs/nestable/jquery.nestable.js")}}" type="text/javascript"></script>
@endsection

@section("scripts")
<script src="{{asset("assets/back/js/scripts/menu/index.js")}}"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @if($mensaje = session("mensaje"))
            <x-alert tipo="success" :mensaje="$mensaje" />
        @endif
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="text-white float-left">Menús</h5>
                <a href="{{route('menu.crear')}}" class="btn btn-outline-light btn-sm float-right">Crear</a>
            </div>
            <div class="card-body">
                @csrf
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach($menus as $key => $item)
                            @if($item["menu_id"] != 0)
                                @break
                            @endif
                            @include("theme.back.menu.menu-item",["item" => $item])
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

