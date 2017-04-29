<?php

namespace App\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password','tipoParticipante'];

    protected $hidden = ['password', 'remember_token'];


    public function isAdmin(){
        return $this->admin == 1;
    }


    public function promoAdmin(){
        $this->admin=true;
        $this->save();
    }

    public function addUsuario($request){
        $this->name = $request->name;
        $this->email = $request->email;
        $this->password = bcrypt($request->password);
        $this->tipoParticipante = $request->tipoParticipante;
        $this->save();
    }

    public function comprobarNFotos($categoria){
        
        $nFotos=Foto::where('idCategoria',$categoria->idCategoria)->where('idParticipante',$this->id)->count();
        return ($nFotos);
    }
}
