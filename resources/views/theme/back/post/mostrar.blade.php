<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success">
                <h5 class="text-white float-left">{{$post->titulo}}</h5>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="categoria" class="col-sm-2 text-right control-label">Categorías:</label>
                    <div class="col-sm-8">
                        {{$post->categoria->implode('nombre', ' - ')}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="categoria" class="col-sm-2 text-right control-label">Tags:</label>
                    <div class="col-sm-8">
                        {{$post->tag->implode('nombre', ' - ')}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="categoria" class="col-sm-2 text-right control-label">Descripción:</label>
                    <div class="col-sm-8">
                        {{$post->descripcion}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="categoria" class="col-sm-2 text-right control-label">Contenido:</label>
                    <div class="col-sm-8">
                        {!!$post->contenido!!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 text-center">
                        @php
                        $imagen = $post->archivo ?? null
                        @endphp
                        @if ($imagen)
                            <img src="{{$imagen->local ? asset("storage/$imagen->ruta") : Storage::disk("s3")->url($imagen->ruta)}}" alt="" width="50%">
                        @endif
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary btn-sm" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>