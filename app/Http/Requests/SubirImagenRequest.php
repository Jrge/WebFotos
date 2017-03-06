<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SubirImagenRequest extends Request
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
                    'image' => 'required|image|max:1024*1024*1',
                    'titulo' => 'required|min:3|max:30|',
                    'descripcion' => 'required|min:3|max:50|',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 1 MB',
            'titulo.required' => 'El campo es requerido',
            'titulo.min' => 'El mínimo de caracteres permitidos son 3',
            'titulo.max' => 'El máximo de caracteres permitidos son 30',
            'descripcion.required' => 'El campo es requerido',
            'descripcion.min' => 'El mínimo de caracteres permitidos son 3',
            'descripcion.max' => 'El máximo de caracteres permitidos son 50',
        ];
    }
}
