<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categoria;


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
       return View('admin.adminFotos');
    }

    public function devuelveUsuarios(){
       return View('admin.adminAdministradores');
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


     public function gestionarFotos(){


    }


     public function gestionarUsuarios(){


    }
    
}
