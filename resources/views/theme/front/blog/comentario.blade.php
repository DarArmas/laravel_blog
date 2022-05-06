@php
    $avatar = $comentario->usuario->archivo ?? null
@endphp
<div class="media">
    <a href="javascript:;" class="pull-left">
        <img src="{{$avatar->local ? asset("storage/$avatar->ruta") : Storage::disk('s3')->url($avatar->ruta)}}"
        alt="" class="media-object">    
    </a>    
    <div class="media-body">
        <h4 class="media-heading">&nbsp; <span>{{$comentario->created_at->diffForHumans()}} / <a href="javascript:;" class="boton-reply">Reply</a></span></h4>
        <p>{{$comentario->contenido}}</p>
        @forelse($comentario->hijo as $hijo)
        @php
            $avatarH = $hijo->usuario->archivo ?? null
        @endphp
        <div class="media">
            <a href="javascript:;" class="pull-left">
                <img src="{{$avatarH->local ? asset("storage/$avatarH->ruta") : Storage::disk('s3')->url($avatarH->ruta)}}"
                alt="" class="media-object">    
            </a>    
            <div class="media-body">
                <h4 class="media-heading">&nbsp; <span>{{$hijo->created_at->diffForHumans()}}</span></h4>
                <p>{{$hijo->contenido}}</p>
            </div>
        </div>
        @empty
        @endforelse
    </div>
    
    <div class="form-reply" style="display:none">
        @include("theme.front.blog.comentario-form-reply")
    </div>
</div>