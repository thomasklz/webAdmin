<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller
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
        $servicios = DB::table('servicio')
            ->join('unidadservicio', 'servicio.id', '=', 'unidadservicio.idServicio')
            ->join('unidadacademica', 'unidadservicio.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('servicio.*','unidadacademica.nombre as unidad')
            ->where('servicio.estado','=',1)
            ->where('servicio.id','=',$id)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get(); 

        $micrositios = DB::table('unidadacademica')
            ->select('unidadacademica.*')
            ->where('estado','=',1)
            ->where('nombre','=',$micrositio)
            ->get(); 

        $serviciosList = DB::table('servicio')
            ->join('unidadservicio', 'servicio.id', '=', 'unidadservicio.idServicio')
            ->join('unidadacademica', 'unidadservicio.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('servicio.*', 'unidadacademica.nombre as unidad')
            ->where('servicio.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->orderBy('servicio.id', 'desc')
            ->take(3)
            ->get(); 

   		return view('adminlte::plantilla.servicios', compact('redesSociales', 'servicios','serviciosList','micrositios'));  
   	}	 
}
