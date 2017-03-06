<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $primaryKey = 'idFoto';


    protected $fillable = ['idCategoria', 'idParticipante','Titulo','descripcion','nombreArchivo','votos'];

    protected $hidden = ['remember_token'];


    public function subirImagen($idCategoria, $idParticipante, $request, $nombreArchivo){
        $this->idCategoria=$idCategoria;
        $this->idParticipante=$idParticipante;
        $this->titulo=$request->titulo;
        $this->descripcion=$request->descripcion;
        $this->nombreArchivo=$nombreArchivo;
        $this->save();
    }

    public function ponerVisible(){
        $this->visible=true;
        $this->save();
    }


    public function aumentarVoto(){
        $this->votos++;
        $this->save();
    }


    public function setContrario(){
        switch($this->comprobarVisible())
        {
            case false:
                $this->visible=1;
                $this->save();
                break;
            case true:
                $this->visible=0;
                $this->save();
                break;
        }

    }


    public function comprobarVisible(){
        if($this->visible=true){
            return 1;
        }else{
            return 0;
        }
    }
}
