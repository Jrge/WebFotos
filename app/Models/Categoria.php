<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Categoria extends Model
{


    protected $fillable = ['idCategoria','Titulo', 'descripcion','limite','icono', 'banner'];


    protected $hidden = ['remember_token'];


    public function crearCategoria(Request $request)
    {
        $this->Titulo=$request->titulo;
        $this->descripcion=$request->descripcion;
        $this->limite=$request->limite;
        $this->icono=$request->optradio;
        $this->subirBanner($request);
        $this->save();
    }


    public function actualizarCategoria(Request $request){
        $this->Titulo=$request->titulo;
        $this->descripcion=$request->descripcion;
        $this->limite=$request->limite;
        $this->icono=$request->optradio;
        $this->subirBanner($request);
        $this->save();
    }

    public function subirBanner(Request $request){
        $name = str_random(30) . '-' . $request->file('banner')->getClientOriginalName();
        $request->file('banner')->move('banners', $name);
        $this->banner=$name;
        
    }
}
