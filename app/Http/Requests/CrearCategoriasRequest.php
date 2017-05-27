<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearCategoriasRequest extends Request
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
            'titulo' => 'required|min:5|max:20|',
            'descripcion' => 'required|min:5|max:50|',
            'limite' => 'numeric|min:1|max:10',
            'banner' => 'required|image|max:3072',
            ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El campo es requerido',
            'titulo.min' => 'El mínimo de caracteres permitidos son 5',
            'titulo.max' => 'El máximo de caracteres permitidos son 20',
            'descripcion.required' => 'El campo es requerido',
            'descripcion.min' => 'El mínimo de caracteres permitidos son 5',
            'descripcion.max' => 'El máximo de caracteres permitidos son 50',
            'limite.required' => 'El campo es requerido',
            'limite.min' => 'El límite minimo de fotos permitido es 1.',
            'limite.max' => 'El límite máximo de fotos permitido es 10.',
            'banner.required' => 'La imagen es requerida',
            'banner.image' => 'Formato no permitido',
            'banner.max' => 'El máximo permitido es 3 MB',
            ];
    }
}
