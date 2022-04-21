@extends('theme.back.app')
@section("titulo")
Permiso Rol
@endsection

@section("scripts")
<script src="{{asset("assets/back/js/scripts/permiso-rol/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    @csrf
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="text-white float-left">Permiso Rol</h5>
                <a href="{{route('menu.crear')}}" class="btn btn-outline-light btn-sm float-right">Crear permiso</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <th>Permiso</th>
                        @foreach ($roles as $id => $nombre)
                            <th class="text-center">{{$nombre}}</th>
                        @endforeach
                    </thead>
                    <tbody>
                        @foreach ($permisos as $permiso)
                        <tr>
                            <td>
                                {{$permiso->nombre}}
                            </td>
                            @foreach ($roles as $rol_id => $nombre)
                                <td class="text-center">
                                    <input type="checkbox" class="permiso_rol"
                                    data-url="{{route("permiso-rol.guardar")}}"
                                    data-permiso="{{$permiso->id}}"
                                    value="{{$rol_id}}"
                                    {{in_array($rol_id, $permiso->roles->pluck('id')->toArray()) ? "checked" : ""}}
                                    >
                                </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection