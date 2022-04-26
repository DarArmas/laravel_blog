<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Requests\Backend\ValidarCategoria;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::get();
        return view('theme.back.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {
        if($request->ajax()){
            return view('theme.back.categoria.crear');
        }else{
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarCategoria $request)
    {
        if($request->ajax()){
            Categoria::create($request->validated());
            return $this->vista();
        }else{
            abort(404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request,$id)
    {
        if($request->ajax()){
            $data = Categoria::findOrFail($id);
            return view('theme.back.categoria.editar', compact('data'));
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarCategoria $request, $id)
    {
        if($request->ajax()){
            Categoria::findOrFail($id)->update($request->validated());
            return $this->vista();
        }else{
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if($request->ajax()){
            try{
                Categoria::destroy($id);
            }catch(QueryException $exception){
                return response()->json(['mensaje' => 'ng']);
            }
            return response()->json(['mensaje' => 'ok']);
        }else{
            abort(404);
        }
    }

    public function vista(){
        $categorias = Categoria::orderBy('id')->get();
        return view('theme.back.categoria.tabla-data',compact('categorias'));
    }
}
