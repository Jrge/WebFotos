<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{

    public function retornoIndex(){
        return view('index');
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
