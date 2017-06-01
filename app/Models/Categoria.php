<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Categoria extends Model
{

    protected $primaryKey = 'idCategoria';

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
        //SE COMPRUEBA SI SE PASA FICHERO PARA ACTUALIZAR EL BANNER, SI NO SE DEJA EL MISMO QUE TENGA EN ESTOS MOMENTOS.
        if($request->file('banner')!=null){
            $this->subirBanner($request);            
        }
        $this->save();
        return true;
    }

    public function subirBanner(Request $request){
        $name = str_random(30) . '-' . $request->file('banner')->getClientOriginalName();
        $request->file('banner')->move('banners', $name);
        $this->banner=$name;
        
    }
}
