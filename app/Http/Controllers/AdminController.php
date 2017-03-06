<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Foto;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class AdminController extends Controller
{

       public function __construct(){
       $this->middleware('auth');
     
    }

 /* Metodo que retorna si es administrador*/
  private function isAdmin(){
        if (Auth::user()->admin) return true;
        else return false;
    }    

/*
Si no es administrador no le retorna la vista si lo es puede acceder a la vista
*/
      public function mostrarAdmin(){
        if ($this->isAdmin()){
            return View('admin.admin');
        } else{
            return redirect()->back();
        }
    }

    public function devuelveCategorias(){


       return View('admin.adminCategorias');

    }

    public function devuelveFotos(){

        $fotos=Foto::paginate(2);

       return View('admin.adminFotos',compact('fotos'));

    }

    public function devuelveUsuarios(){
    $listaUsuarios = User::paginate(2);
       return View('admin.adminAdministradores',compact('listaUsuarios'));

    }

    public function gestionarCategorias(Request $request){

        $rules = [
            'titulo' => 'required|min:5|max:20|',
            'descripcion' => 'required|min:5|max:50|',
            ];

        $messages = [
            'titulo.required' => 'El campo es requerido',
            'titulo.min' => 'El mínimo de caracteres permitidos son 5',
            'titulo.max' => 'El máximo de caracteres permitidos son 20',
            'descripcion.required' => 'El campo es requerido',
            'descripcion.min' => 'El mínimo de caracteres permitidos son 5',
            'descripcion.max' => 'El máximo de caracteres permitidos son 50',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect("adminCategorias")
            ->withErrors($validator)
            ->withInput();
        }else{
            $categoria=new Categoria;
            $categoria->Titulo=$request->titulo;
            $categoria->descripcion=$request->descripcion;
            $categoria->save();          
            return redirect("adminCategorias")
            ->with("mensaje", "Categoria creada correctamente");
        }

    }


     public function gestionarFotos(Request $request){

        $fotos_checkeadas=$request->input('fotos');
        if(is_array($fotos_checkeadas)){

            foreach($fotos_checkeadas as $nombreFoto){
            $foto=Foto::where('nombreArchivo',$nombreFoto)->first();
            $foto->visible=true;
              $foto->save();
            }
        return redirect("adminFotos")
        ->with("mensaje", "Fotos modificadas correctamente");
        }

    }


     public function gestionarUsuarios(Request $request){
           // $claseExitosa="alert alert-success";
            //$claseError="alert alert-danger";
            $idUsuario = $request->input('promocionar');
            $usuario=User::find($idUsuario);
            if($usuario!=null && $usuario->admin<1){
                $usuario->admin=true;
                $usuario->save();             
                return redirect("adminAdministradores")
                //->with("claseMsg","alert alert-success")             
                ->with("mensaje", "Usuario promocionado correctamente.");
            }elseif($usuario!=null && $usuario->admin>=1){
                return redirect("adminAdministradores")
                ->with("mensaje", "Este usuario ya es Administrador")
                //->with("claseMsg","alert alert-danger")
                ->withInput();  
            }
        /*
        $rules = [
                'email' => 'required|email|max:255|',
            ];

        $messages = [
            'email.email' => 'El formato de email es incorrecto',
            'email.max' => 'El máximo de caracteres permitidos son 255',
        ];
        

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect("adminAdministradores")
            ->withErrors($validator)
            ->withInput();
        }else{


            $usuario=User::where('email',$request->email)->first();

            if($usuario!=null && $usuario->admin<1){
                $usuario->admin=true;
                $usuario->save();
                
                return redirect("adminAdministradores")
                ->with("mensaje", "Usuario promocionado correctamente.");                
            }elseif($usuario!=null && $usuario->admin>=1){
                return redirect("adminAdministradores")
                ->with("mensaje", "Este usuario ya es Administrador")
                ->withInput();  
            }else{
                return redirect("adminAdministradores")
                ->with("mensaje", "Este correo no existe")
                ->withInput();  
            }



        }

        */

    }
    
}
