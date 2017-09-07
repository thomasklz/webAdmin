<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EstadoProyecto;
use App\CategoriaProyecto;
use App\Proyecto;
use App\UnidadProyecto;
use App\UnidadAcademica;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $estados = DB::table('EstadoProyecto')
                     ->where('estado','=',1)
                     ->get();
      $proyectos = DB::table('Proyecto')
                     ->where('estado','=',1)
                     ->get();

      $proyectos = DB::table('Proyecto')
            ->join('categoriaproyecto', 'Proyecto.idCategoriaproyecto', '=', 'categoriaproyecto.id')
            ->join('estadoproyecto', 'Proyecto.idEstadoproyecto', '=', 'estadoproyecto.id')
            ->join('unidadproyecto', 'Proyecto.id', '=', 'unidadproyecto.idProyecto')
            ->join('unidadacademica', 'unidadproyecto.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('Proyecto.*', 'categoriaproyecto.categoria', 'estadoproyecto.nombre as estado', 'unidadacademica.nombre as unidad')
            ->get();            
        //$value = str_limit('The PHP framework for web artisans.', 7);
      $categorias = DB::table('CategoriaProyecto')
                     ->where('estado','=',1)
                     ->get();
      $unidadAcademicas = DB::table('UnidadAcademica')
                     ->where('estado','=',1)
                     ->get();            
      return view('adminlte::proyecto.proyecto', compact('estados','categorias', 'unidadAcademicas','proyectos'));
    }
    public function store(Request $request)
    {
        
      $this->validate($request, [
    					 'autor' => 'required|alpha',
    					 'titulo' => 'required',
    					 'contenido' => 'required',
    					 'foto' => 'required|mimes:jpg,png,jpeg',
    					]);

    	$file = $request->file('foto');
      $nombre = $file->getClientMimeType();
      $tipoImagen = str_replace('image/', '.',$nombre);
      $fileName = uniqid() .$tipoImagen ;
      $path = public_path() . '/img/proyectos';
      $file->move($path, $fileName);

      $date= new \DateTime();
      $proyecto = new Proyecto;
      $proyecto->autor = $request->autor;
      $proyecto->titulo = $request->titulo;
      $proyecto->contenido = $request->contenido;
      $proyecto->foto = $fileName;
      $proyecto->fecha = $date->format('Y-m-d');
      $proyecto->estado = 1 ;
      $proyecto->idCategoriaproyecto = $request->idCategoriaproyecto;
      $proyecto->idEstadoproyecto = $request->idEstadoproyecto;
      $proyecto->save();

      $unidadesProyecto = new UnidadProyecto;
      $unidadesProyecto->idProyecto = $proyecto->id;
      $unidadesProyecto->idUnidadacademica = $request->idUnidadAcademica;
      $unidadesProyecto->save();
      alertify()->success('Proyecto registrado correctamente')->delay(3000)->position('bottom right');
      return redirect('proyecto');
    }
}
