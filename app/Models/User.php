<?php

namespace App\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\Categoria;
use App\Models\Foto;

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


    public function devolverDatosHome(){
        $nFotos=Foto::where('idParticipante',$this->id)->count();
        $fotosUsuario=Foto::where('idParticipante',$this->id)->get();
        $nVotosTotales=0;
        foreach ($fotosUsuario as $foto) {
            $nVotosTotales+=$foto->votos;
        }

        $mejorFotoUsuario=Foto::where('idParticipante',$this->id);


        if(Foto::where('idParticipante',$this->id)->orderBy('votos', 'DESC')->first()!=null){
            $mejorFotoUsuario=$this->mejorFoto();
            $categoriaMejorFoto=Categoria::where('idCategoria',$mejorFotoUsuario->idCategoria)->first();
            $tituloCategoria=$categoriaMejorFoto->Titulo;
             return compact(['nFotos', 'nVotosTotales','mejorFotoUsuario','tituloCategoria']);
        }

        else{
            $mejorFotoUsuario=null;
            $tituloCategoria=null;
             return compact(['nFotos', 'nVotosTotales','mejorFotoUsuario','tituloCategoria']);
        }

       

    }


    public function mejorFoto(){
        $mejorFotoUsuario=Foto::where('idParticipante',$this->id)->orderBy('votos', 'DESC')->first();
        return $mejorFotoUsuario;    
    }


    /*
    Función para subir imagen.
    Le pasamos un request con los datos de la vista, si es posible generamos la nueva foto, y retornamos un mensaje con el estado del proceso a la vista
    */

    public function subirImagen($request){
        //generamos una cadena aleatoria para el nombre del fichero y lo movemos a la carpeta del servidor.
        $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move('fotografias', $name);

        //recogemos los valores de la vista a través del request 
        $select = $request->input('optradio');
        $categoria=Categoria::where('Titulo',$select)->first();
        $this->comprobarNFotos($categoria);
        //si el usuario no ha superado el limite de fotos en la categoria, generamos la tupla en la BD
        if(($this->comprobarNFotos($categoria))<($categoria->limite)){
            $foto = new Foto;
            $foto->subirImagen($categoria->idCategoria, $this->id, $this->tipoParticipante, $request, $name);
            if($this->comprobarNFotos($categoria)!=$categoria->limite){
                return 'Su imagen en la categoria '.$categoria->Titulo. ' ha sido subida con exito. 
                Número de fotos restantes posibles por subir en esta categoría: '.($categoria->limite-$this->comprobarNFotos($categoria)).'.';
            }else{
                return 'Su imagen en la categoria '.$categoria->Titulo. ' ha sido subida con exito, ha alcanzado el máximo de fotos permitidas.';;
            }               
        }else{
            return 'No ha sido posible subir la foto, ha alcanzado el número máximo de fotos para esta categoría.';
        }
        
    }
}
