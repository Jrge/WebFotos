<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Foto;
use App\Http\Requests\CrearCategoriasRequest;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class AdminController extends Controller
{

       public function __construct(){
    }

/*
Si no es administrador no le retorna la vista si lo es puede acceder a la vista
*/
      public function mostrarAdmin(){
            return View('admin.admin');
    }

    public function devuelveCategorias(){


       return View('admin.adminCategorias');

    }


     public function listadoFotos(){
        $fotos=Foto::orderBy('votos', 'DESC')->paginate(1); 

       return View('admin.adminListadoFotografias',compact('fotos'));

    }

    //METODO POST DE LISTADO FOTOS
     public function devuelvelistadoFotos(Request $request){
 
        return View('admin.adminListadoFotografias');


    }

    public function devuelveFotos(){

        $fotos=Foto::paginate(4);

       return View('admin.adminFotos',compact('fotos'));

    }

    public function devuelveUsuarios(){
    $listaUsuarios = User::paginate(1);
       return View('admin.adminAdministradores',compact('listaUsuarios'));

    }

    public function gestionarCategorias(CrearCategoriasRequest $request){

            $categoria=new Categoria;
            $categoria->crearCategoria($request);
            return redirect("adminCategorias")
            ->with("mensaje", "Categoria creada correctamente");
    }


     public function gestionarFotos(Request $request){

        /*$fotos_checkeadas=$request->input('fotos');
        if(is_array($fotos_checkeadas)){

            foreach($fotos_checkeadas as $nombreFoto){
            $foto=Foto::where('nombreArchivo',$nombreFoto)->first();
            $foto->ponerVisible();
            }
        return redirect("adminFotos")
        ->with("mensaje", "Fotos modificadas correctamente");
        }
*/
        $foto=Foto::where('nombreArchivo',$request->input('btnCambiar'))->first();

            if($foto->visible>0){
                $foto->visible=0;
                $foto->save();
            }else{
                $foto->visible=1;
                $foto->save();
            }

        return redirect("adminFotos")
        ->with("mensaje","Fotos modificada correctamente");


    }


     public function gestionarUsuarios(Request $request){
           // $claseExitosa="alert alert-success";
            //$claseError="alert alert-danger";
            $idUsuario = $request->input('promocionar');
            $usuario=User::find($idUsuario);
            if($usuario!=null && !$usuario->isAdmin()){
                $usuario->promoAdmin();            
                return redirect("adminAdministradores")
                //->with("claseMsg","alert alert-success")             
                ->with("mensaje", "Usuario promocionado correctamente.");
            }elseif($usuario!=null && $usuario->isAdmin()){
                return redirect("adminAdministradores")
                ->with("mensaje", "Este usuario ya es Administrador")
                //->with("claseMsg","alert alert-danger")
                ->withInput();  
            }

    }
    
}
