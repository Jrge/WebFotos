<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /*
    public function index()
    {
        $items = [
            'Home'          => ['full_url' => 'http://localhost/WebFotos/public'],
            'Votar'         => ['full_url' => 'http://localhost/WebFotos/public/votar'],
            'Login'         => ['full_url' => 'http://localhost/WebFotos/public/login'],
            'Sign-up'       => ['full_url' => 'http://localhost/WebFotos/public/signup']
        ];
        return view('index', compact('items'));
    }
    */

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
