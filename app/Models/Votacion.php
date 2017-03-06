<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Votacion extends Model
{

    protected $table = 'votaciones';

  
    protected $fillable = ['ip', 'idFoto'];


    protected $hidden = ['remember_token'];



    public function posibleVotar()
    {
        $fechaVoto=$this->created_at;
        $fechaActual=Carbon::now();
        return ($fechaActual->subDay(1)>$fechaVoto);
    }

    public function votar($idFoto,$request)
    {
        $this->idFoto=$idFoto;
        $this->ip=$request->ip();
        $this->save();
    }
}
