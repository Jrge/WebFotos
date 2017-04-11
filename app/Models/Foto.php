<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $primaryKey = 'idFoto';


    protected $fillable = ['idCategoria', 'idParticipante','tipoParticipante','Titulo','descripcion','nombreArchivo','votos','visible'];

    protected $hidden = ['remember_token'];


    public function subirImagen($idCategoria, $idParticipante,$tipoParticipante, $request, $nombreArchivo){
        $this->idCategoria=$idCategoria;
        $this->idParticipante=$idParticipante;
        $this->tipoParticipante=$tipoParticipante;
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

            if($this->visible>0){
                $this->visible=0;
                $this->save();

            }else{
                $this->visible=1;
                $this->save();
            }
        }

}
