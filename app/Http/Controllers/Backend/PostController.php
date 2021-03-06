<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Tag;
use App\Models\Backend\Post;
use Illuminate\Http\Request;
use App\Models\Backend\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\ValidarPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('theme.back.post.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id');
        $tags = Tag::orderBy('id')->pluck('nombre', 'id');
        return view('theme.back.post.crear', compact('categorias', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarPost $request)
    {
        $post = Post::create($request->validated());
        $categorias = $request->categoria;
        $post->categoria()->sync(array_values($categorias));
        // $post->categoria()->attach(aray_values($categorias));  asi independientemente si estan repetidas me agrega, asi no lo quiero 
        $tags = $request->tag ? Tag::setTag($request->tag) : [];
        $post->tag()->sync($tags);

        if($imagen = $request->imagen){
            $folder = "imagen_post";
            $peso = $imagen->getSize();
            $extension = $imagen->extension();
            // $ruta = Storage::disk('public')->put($folder, $imagen);
            // $post->archivo()->create([
            //     'ruta' => $ruta,
            //     'extension' => $extension,
            //     'peso' => $peso
            // ]);

            $ruta = Storage::disk('s3')->put($folder, $imagen, 'public');
            $post->archivo()->create([
                'ruta' => $ruta,
                'extension' => $extension,
                'peso' => $peso,
                'local' => false
            ]);
        }
        
        return redirect()->route('post')->with('mensaje','Post guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Post $post)
    {
        return view("theme.back.post.mostrar", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function editar(Post $post)
    {
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id');
        $tags = Tag::orderBy('id')->pluck('nombre', 'id');
        return view("theme.back.post.editar", compact('post', 'categorias', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarPost $request, Post $post)
    {
       
        $post->update($request->validated());
        $categorias = $request->categoria;
        $post->categoria()->sync(array_values($categorias));
        $tags = $request->tag ? Tag::setTag($request->tag) : [];
        $post->tag()->sync($tags);
        
        if($imagen = $request->imagen){
            $folder = "imagen_post";
            Storage::disk('public')->delete($post->archivo->ruta);
            $post->archivo()->delete();
            $peso = $imagen->getSize();
            $extension = $imagen->extension();
            $ruta = Storage::disk('public')->put($folder, $imagen);
            $post->archivo()->create([
                'ruta' => $ruta,
                'extension' => $extension,
                'peso' => $peso
            ]);
        }

        return redirect()->route('post')->with('mensaje','Post actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if($request->ajax()){
            try{
                Post::destroy($id);
            }catch(QueryException $exception){
                return response()->json(['mensaje' => 'ng']);
            }
            return response()->json(['mensaje' => 'ok']);
        }else{
            abort(404);
        }
    }
}
