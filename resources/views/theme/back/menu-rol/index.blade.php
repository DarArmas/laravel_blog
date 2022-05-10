@extends('theme.back.app')

@section('titulo')
    Menu Rol
@endsection

@section("scripts")
<script src="{{asset("assets/back/js/scripts/menu-rol/index.js")}}"></script>
@endsection

@section('contenido')
    <div class="row">
        @csrf
        <div class="col-lg-12">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <th>Menú</th>
                    @foreach ($roles as $rol)
                        <th class="text-center">{{$rol->nombre}}</th>
                    @endforeach
                </thead>
                <tbody>
                    @foreach($menus as $key => $menu)
                        @if($menu["menu_id"] != null)
                            @break
                        @endif
                        @include('theme.back.menu-rol.item-menu',['menu' => $menu, 'hijo' => 'no'])
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection