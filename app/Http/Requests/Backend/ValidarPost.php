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
        return [
            'usuario_id' => 'required|integer',
            'titulo' => 'required|max:150',
            'slug' => 'required|max:150|unique:post,slug,'.$this->route('id'),
            'contenido' => 'required',
            'descripcion' => 'required|max:255',
            'categoria' => 'required|array',
            'tag' => 'nullable|array',
            'imagen' => 'nullable|file|max:1024|mimes:jpeg,png,jpg'
        ];
    }

    public function messages(){
        return [
            'slug.unique' => 'No se pueden tener dos posts con la misma URL',
        ];
    }
}
