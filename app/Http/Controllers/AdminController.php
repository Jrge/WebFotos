<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    public function gestionarCategorias(){


    }


     public function gestinarFotos(){


    }


     public function gestinarUsuarios(){


    }
    
}
