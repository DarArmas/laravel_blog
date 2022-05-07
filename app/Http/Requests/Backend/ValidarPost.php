<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ValidarPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        $reglas =  [
            'usuario_id' => 'required|integer|exists:usuario,id',
            'titulo' => 'required|max:150',
            'slug' => 'required|max:150|unique:post,slug,'.optional($this->post)->id,
            'contenido' => 'required',
            'descripcion' => 'required|max:255',
            'categoria' => 'required|array',
            'tag' => 'nullable|array',
            'imagen' => 'required|file|max:1024|mimes:jpeg,png,jpg',
            'video' => 'nullable|max:100'
        ];
        if($this->post) 
            $reglas['imagen'] = 'nullable|file|max:1024|mimes:jpeg,png,jpg';
        return $reglas;
    }

    public function messages(){
        return [
            'slug.unique' => 'No se pueden tener dos posts con la misma URL',
        ];
    }
}
