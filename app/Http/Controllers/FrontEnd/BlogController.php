<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Backend\Tag;
use App\Models\Backend\Post;
use Illuminate\Http\Request;
use App\Models\Backend\Categoria;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $tags = Tag::orderBy('nombre')->get();
        $posts = Post::latest('id')->activo()->get();
        return view('theme.front.blog.index', compact('posts', 'categorias'));
    }

    
    public function mostrar($id)
    {
        
    }

    public function categoria(Request $request, $slug){
        $categoria = Categoria::with('post')->where('slug', $slug)->first();
        if(!$categoria) abort(404);
        $posts = $categoria->post;
        $categorias = Categoria::orderBy('nombre')->get();
        $tags = Tag::orderBy('nombre')->get();
        return view('theme.front.blog.index', compact('posts', 'categorias'));
        
    }

   
}
