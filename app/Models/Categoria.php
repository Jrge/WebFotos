<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Categoria extends Model
{


    protected $fillable = ['idCategoria','Titulo', 'descripcion','limite','icono'];


    protected $hidden = ['remember_token'];


    public function crearCategoria(Request $request)
    {
        $this->Titulo=$request->titulo;
        $this->descripcion=$request->descripcion;
        $this->limite=$request->limite;
        $this->icono=$request->optradio;
        $this->save();
    }
}
