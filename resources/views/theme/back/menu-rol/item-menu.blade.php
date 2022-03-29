<tr>
    <td class="{{$hijo == 'si' ? 'pl-4' : 'font-weight-bold'}}">
        <i class="{{$hijo == 'si' ? 'fas fa-arrow-right' : ''}}"></i>{{$menu["nombre"]}}
    </td>
    @foreach($roles as $rol)
        <td class="text-center">
            <input 
            type="checkbox" 
            class="menu-rol"
            data-url={{route('menu-rol.guardar')}}
            data-menu={{$menu["id"]}}
            value="{{$rol->id}}"
           {{in_array($rol->id, array_column($menusRols[$menu["id"]], "id"))? "checked" : ""}}>
        </td>
    @endforeach
</tr>
@foreach($menu["submenu"] as $key => $hijo)
    @include('theme.back.menu-rol.item-menu',['menu' => $hijo, 'hijo' => 'si'])
@endforeach