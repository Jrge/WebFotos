<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImagenPerfilRequest extends Request
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
                'imagePerfil' => 'required|image|max:3072',
                ];
    }

    public function messages()
    {
        return [
            'imagePerfil.required' => 'La imagen es requerida',
            'imagePerfil.image' => 'Formato no permitido',
            'imagePerfil.max' => 'El máximo permitido es 3 MB',
        ];
    }
}
