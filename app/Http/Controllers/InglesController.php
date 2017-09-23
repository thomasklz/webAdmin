<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class InglesController extends Controller
{
    public function index($micrositio)
    {
        $sliders = DB::table('slider')
            ->join('unidadslider', 'slider.id', '=', 'unidadslider.idSlider')
            ->join('unidadacademica', 'unidadslider.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('slider.*')
            ->where('slider.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get(); 

        $filosofias = DB::table('filosofia')
            ->join('unidadfilosofia', 'filosofia.id', '=', 'unidadfilosofia.idFilosofia')
            ->join('unidadacademica', 'unidadfilosofia.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('filosofia.*')
            ->where('filosofia.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get();           

        return view('adminlte::plantilla.home', compact('sliders', 'filosofias'));
    }
}
