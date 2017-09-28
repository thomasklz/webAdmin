<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ProyectosPlantillaController extends Controller
{
    public function index($micrositio, $id)
    {
        $redesSociales = DB::table('redessociales')
            ->join('unidadredessociales', 'redessociales.id', '=', 'unidadredessociales.idRedessociales')
            ->join('unidadacademica', 'unidadredessociales.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('redessociales.*')
            ->where('redessociales.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get();  
            
        $micrositios = DB::table('unidadacademica')
            ->select('unidadacademica.*')
            ->where('estado','=',1)
            ->where('nombre','=',$micrositio)
            ->get();

        $categoriasProyecto = DB::table('proyecto')
            ->join('categoriaproyecto', 'proyecto.idCategoriaproyecto', '=', 'categoriaproyecto.id')
            ->join('estadoproyecto', 'proyecto.idEstadoproyecto', '=', 'estadoproyecto.id')
            ->join('unidadproyecto', 'proyecto.id', '=', 'unidadproyecto.idProyecto')
            ->join('unidadacademica', 'unidadproyecto.idUnidadacademica', '=', 'unidadacademica.id')
            ->select(DB::raw('count(*) as count, categoriaproyecto.categoria'))
            ->where('proyecto.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->groupBy('categoriaproyecto.categoria')
            ->get();

        $proyectos = DB::table('proyecto')
            ->join('categoriaproyecto', 'proyecto.idCategoriaproyecto', '=', 'categoriaproyecto.id')
            ->join('estadoproyecto', 'proyecto.idEstadoproyecto', '=', 'estadoproyecto.id')
            ->join('unidadproyecto', 'proyecto.id', '=', 'unidadproyecto.idProyecto')
            ->join('unidadacademica', 'unidadproyecto.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('proyecto.id','proyecto.titulo','proyecto.foto','proyecto.fecha', 'proyecto.autor',  'categoriaproyecto.categoria', 'estadoproyecto.nombre as estado')
            ->where('proyecto.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->orderBy('proyecto.id', 'desc')
            ->take(5)
            ->get();

         $proyectosActual = DB::table('proyecto')
            ->join('categoriaproyecto', 'proyecto.idCategoriaproyecto', '=', 'categoriaproyecto.id')
            ->join('estadoproyecto', 'proyecto.idEstadoproyecto', '=', 'estadoproyecto.id')
            ->join('unidadproyecto', 'proyecto.id', '=', 'unidadproyecto.idProyecto')
            ->join('unidadacademica', 'unidadproyecto.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('proyecto.*','categoriaproyecto.categoria', 'estadoproyecto.nombre as estado')
            ->where('proyecto.estado','=',1)
            ->where('proyecto.id','=',$id)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get();        

        return view('adminlte::plantilla.proyectos', compact('redesSociales', 'micrositios','proyectos','categoriasProyecto','proyectosActual'));           
	} 
	public function proyectoCategoria($micrositio, $id)
    {
    	 $redesSociales = DB::table('redessociales')
            ->join('unidadredessociales', 'redessociales.id', '=', 'unidadredessociales.idRedessociales')
            ->join('unidadacademica', 'unidadredessociales.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('redessociales.*')
            ->where('redessociales.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get();  
            
        $micrositios = DB::table('unidadacademica')
            ->select('unidadacademica.*')
            ->where('estado','=',1)
            ->where('nombre','=',$micrositio)
            ->get();

        $categoriasProyecto = DB::table('proyecto')
            ->join('categoriaproyecto', 'proyecto.idCategoriaproyecto', '=', 'categoriaproyecto.id')
            ->join('estadoproyecto', 'proyecto.idEstadoproyecto', '=', 'estadoproyecto.id')
            ->join('unidadproyecto', 'proyecto.id', '=', 'unidadproyecto.idProyecto')
            ->join('unidadacademica', 'unidadproyecto.idUnidadacademica', '=', 'unidadacademica.id')
            ->select(DB::raw('count(*) as count, categoriaproyecto.categoria'))
            ->where('proyecto.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->groupBy('categoriaproyecto.categoria')
            ->get();

        $proyectos = DB::table('proyecto')
            ->join('categoriaproyecto', 'proyecto.idCategoriaproyecto', '=', 'categoriaproyecto.id')
            ->join('estadoproyecto', 'proyecto.idEstadoproyecto', '=', 'estadoproyecto.id')
            ->join('unidadproyecto', 'proyecto.id', '=', 'unidadproyecto.idProyecto')
            ->join('unidadacademica', 'unidadproyecto.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('proyecto.id','proyecto.titulo','proyecto.foto','proyecto.fecha', 'proyecto.autor',  'categoriaproyecto.categoria', 'estadoproyecto.nombre as estado')
            ->where('proyecto.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->orderBy('proyecto.id', 'desc')
            ->take(5)
            ->get();

        $proyectosSelect = DB::table('proyecto')
            ->join('categoriaproyecto', 'proyecto.idCategoriaproyecto', '=', 'categoriaproyecto.id')
            ->join('estadoproyecto', 'proyecto.idEstadoproyecto', '=', 'estadoproyecto.id')
            ->join('unidadproyecto', 'proyecto.id', '=', 'unidadproyecto.idProyecto')
            ->join('unidadacademica', 'unidadproyecto.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('proyecto.id','proyecto.titulo','proyecto.foto','proyecto.fecha', 'proyecto.autor',  'categoriaproyecto.categoria', 'estadoproyecto.nombre as estado')
            ->where('proyecto.estado','=',1)
            ->where('categoriaproyecto.categoria','=',$id)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->orderBy('proyecto.id', 'desc')
            ->take(5)
            ->get();
         return view('adminlte::plantilla.proyectosCategoria', compact('redesSociales', 'micrositios','proyectos','categoriasProyecto','proyectosSelect'));             
    }
}
