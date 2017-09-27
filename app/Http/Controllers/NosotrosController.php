<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class NosotrosController extends Controller
{
    public function index($micrositio)
    {
        $micrositios = DB::table('unidadacademica')
            ->select('unidadacademica.*')
            ->where('estado','=',1)
            ->where('nombre','=',$micrositio)
            ->get(); 
        $redesSociales = DB::table('redessociales')
            ->join('unidadredessociales', 'redessociales.id', '=', 'unidadredessociales.idRedessociales')
            ->join('unidadacademica', 'unidadredessociales.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('redessociales.*')
            ->where('redessociales.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get();  
   		return view('adminlte::plantilla.nosotros', compact('redesSociales', 'micrositios'));  
   	}	      
}
