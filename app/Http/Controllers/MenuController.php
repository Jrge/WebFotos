<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categoria;


class MenuController extends Controller
{

    public function retornoIndex(){
        $categorias=Categoria::get();
        return View('index',compact('categorias'));
    }

    public function retornoVotar(){
        return view('votar');
    }

    public function retornoLogin(){
        return view('login');
    }

    public function retornoRegistrar(){
        return view('registrar');
    }

}
