<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Votacion extends Model
{


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
    protected $fillable = ['ip', 'idFoto','fecha_hora'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];
}
