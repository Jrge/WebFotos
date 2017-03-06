<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $primaryKey = 'idFoto';


    protected $fillable = ['idCategoria', 'idParticipante','Titulo','descripcion','nombreArchivo','votos'];

    protected $hidden = ['remember_token'];


    public function subirImagen($idCategoria, $idParticipante, $titulo, $descripcion, $nombreArchivo){
        $this->idCategoria=$idCategoria;
        $this->idParticipante=$idParticipante;
        $this->titulo=$titulo;
        $this->descripcion=$descripcion;
        $this->nombreArchivo=$nombreArchivo;
        $this->save();
    }
}
