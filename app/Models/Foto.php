<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $primaryKey = 'idFoto';

    /**
     * The database table used by the model.
     *
     * @var string
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idCategoria', 'idParticipante','Titulo','descripcion','nombreArchivo','votos'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];
}
