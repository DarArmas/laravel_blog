@extends('theme.back.app')
@section("titulo")
Post
@endsection

@section("scripts")
<script src="{{asset("assets/back/js/scripts/post/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @if ($mensaje = session("mensaje"))
            <x-alert tipo="success" :mensaje="$mensaje"/>
        @endif
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="text-white float-left">Posts</h5>
                <a href="{{route('post.crear')}}" class="btn btn-outline-light btn-sm float-right">Crear post</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Imagen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            @php
                              $imagen = $post->archivo ?? null  
                            @endphp
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->titulo}}</td>
                                    <td>
                                        @if($imagen)
                                        <img src="{{$imagen->local ? asset("storage/$imagen->ruta") : Storage::disk("s3")->url($imagen->ruta)}}" alt=""  width="80px">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection