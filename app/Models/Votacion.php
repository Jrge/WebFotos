<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Votacion extends Model
{

    protected $table = 'votaciones';

  
    protected $fillable = ['ip', 'idFoto'];


    protected $hidden = ['remember_token'];

    protected $primaryKey = 'idFoto';



    public function posibleVotar()
    {
        $fechaVoto=$this->updated_at;
        $fechaActual=Carbon::now();
        return ($fechaActual->subDay(1)>$fechaVoto);
    }

    public function crearVoto($idFoto,$request)
    {
        $this->idFoto=$idFoto;
        $this->ip=$request->ip();
        $this->save();
    }

    public function actualizarVoto(){
        $this->touch();
        $this->save();
    }
}
