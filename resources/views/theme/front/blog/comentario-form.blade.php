<div class="post-comment padding-top-40">
    <h3>Deje su comentario</h3>
    <form action="{{route("comentario.guardar", $post)}}" role="form" method="POST">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input class="form-control" type="text" value="{{Auth::user()->nombre}}" readonly>
        </div>

        <div class="form-group">
            <label>Email <span class="color-red">*</span></label>
            <input class="form-control" type="text" value="{{Auth::user()->email}}" readonly>
        </div>

        <div class="form-group">
            <label>Mensaje</label>
            <textarea class="form-control" name="contenido" rows="8" required></textarea>
            <input type="hidden" name="usuario_id" value="{{Auth::user()->id}}">
        </div>
        <p><button class="btn btn-primary" type="submit">Enviar</button></p>
    </form>
</div>