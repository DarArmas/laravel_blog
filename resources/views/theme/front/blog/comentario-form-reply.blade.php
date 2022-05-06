<div class="padding-top-10">
    <h5>Deje su replica</h5>
    <form action="{{route("comentario.guardar", $post)}}" role="form" method="POST">
        @csrf
        <div class="form-group">
            <label>Mensaje</label>
            <textarea class="form-control" name="contenido" rows="8" required></textarea>
            <input type="hidden" name="usuario_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="comentario_id" value="{{$comentario->id}}">
        </div>
        <p><button class="btn btn-primary" type="submit">Enviar</button></p>
    </form>
</div>