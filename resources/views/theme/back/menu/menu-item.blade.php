@if ($item["submenu"] == [])
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <a href="{{route("menu.editar", $item["id"])}}">{{$item["nombre"] . " | Url -> " . $item["url"]}} | Icono -> <i style="font-size:20px;" class="fa fa-fw {{isset($item["icono"]) ? $item["icono"] : ""}}"></i></a>
        <form action="{{route("menu.eliminar", $item["id"])}}" class="form-eliminar d-inline" method="POST">
            @csrf @method('delete')
            <button type="button" class="btn-accion-tabla float-right boton-eliminar" data-toggle="tooltip" title="Eliminar este menú"><i class="text-danger fas fa-trash"></i></button>
        </form>
    </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <a href="{{route("menu.editar", $item["id"])}}">{{ $item["nombre"] . " | Url -> " . $item["url"]}} | Icono -> <i style="font-size:20px;" class="fa fa-fw {{isset($item["icono"]) ? $item["icono"] : ""}}"></i></a>
        <form action="{{route("menu.eliminar", $item["id"])}}" class="form-eliminar d-inline" method="POST">
            @csrf @method('delete')
            <button type="button" class="btn-accion-tabla float-right boton-eliminar" data-toggle="tooltip" title="Eliminar este menú"><i class="text-danger fas fa-trash"></i></button>
        </form>
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
        @include("theme.back.menu.menu-item",[ "item" => $submenu ])
        @endforeach
    </ol>
</li>
@endif
