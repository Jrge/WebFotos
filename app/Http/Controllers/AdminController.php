<?php

namespace App\Http\Controllers;
use Cache;

use Closure;
use Illuminate\View\Factory;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\Support\Contracts\ArrayableInterface as Arrayable;
use DB;
use Illuminate\Support\Facades\View;
use Input; 
use App\Models\User;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Foto;
use App\Http\Requests\CrearCategoriasRequest;
use App\Http\Requests\ModificarCategoriaRequest;

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
        $fotos=Foto::orderBy('votos', 'DESC')->paginate(10); 

       return View('admin.adminListadoFotografias',compact('fotos'));

    }
    

    //METODO POST DE LISTADO FOTOS
     public function devuelvelistadoFotos(Request $request){
        $query=Foto::query();

        if($request->input('alumno')!=null){
            $query=$query->orWhere('tipoParticipante','alumno');
        }
        if($request->input('tutor')!=null){
            $query=$query->orWhere('tipoParticipante','tutor');
        }
        if($request->input('profesor')!=null){
            $query=$query->orWhere('tipoParticipante','profesor');
        }
        $fotos=$query->orderBy('votos','DESC')
            ->paginate($request->input('numResultados'));


        return View('admin.adminListadoFotografias',compact('fotos'));


    }

    public function devuelveFotos(){

        $fotos=Foto::paginate(10);

       return View('admin.adminFotos',compact('fotos'));

    }

    public function devuelveUsuarios(){
    $listaUsuarios = User::paginate(10);
       return View('admin.adminAdministradores',compact('listaUsuarios'));
    }

    public function gestionarCategorias(CrearCategoriasRequest $request){

            $categoria=new Categoria;
            $categoria->crearCategoria($request);
            return redirect("adminCategorias")
            ->with("mensaje", "Categoria creada correctamente");
    }

     public function gestionarFotos(Request $request){

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

    public function gestionCategoria(){

            $categorias=Categoria::paginate(10);
            return View('admin.adminGestionarCategoria',compact('categorias'));
    }


     public function gestionarUsuarios(Request $request){
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
                ->withInput();  
            }

    }


    public function modificarCategorias(Request $request){
        //comprobamos si estamos en la vista que nos muestra las categorias existentes
        if($request->exists('btnCambiar')){
            $variable=Input::get('btnCambiar');
            $categoria = DB::table('categorias')->where('idCategoria', $variable)->first();
            return View('admin.adminModificarCategorias',compact('categoria'));            
        }elseif($request->exists('btnModificar')){ //si no es que ya se ha seleccionado la categoría a modificar.
            $categoria=Categoria::where('idCategoria',$request->idCategoria)->first();
            if($categoria->actualizarCategoria($request)){
                return View('admin.adminModificarCategorias')
                ->with("categoria",$categoria)
                ->with("mensaje","Categoria modificada correctamente."); 
            }
        }

    }

    public function estadisticas(){

        $fotos = DB::table('fotos')->count();
        $fotosNoV = DB::table('fotos')->where('visible', '0')->count();
        $fotosV = DB::table('fotos')->where('visible', '1')->count();



      $chartjs = app()->chartjs
            ->name('Fotografias')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Totales', 'No visibles','Visibles'])
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB','#90A2EB'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                    'data' => [$fotos,  $fotosNoV, $fotosV]
                ]
            ])
            ->options([]);


        $users = DB::table('users')->count();
        $usersA = DB::table('users')->where('tipoParticipante', 'alumno')->count();
        $usersP = DB::table('users')->where('tipoParticipante', 'profesor')->count();
        $usersT = DB::table('users')->where('tipoParticipante', 'tutor')->count();



      $chart = app()->chartjs
            ->name('Usuarios')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Totales', 'Alumnos/as','Profesores/as','Padre/Madre'])
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB','#90A2EB','#03A2EB'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                    'data' => [$users,  $usersA, $usersP, $usersT]
                ]
            ])
            ->options([]);

            return view('admin.estadisticas', compact('chartjs','chart'));

            }
    
}
