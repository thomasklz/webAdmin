<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class NoticiaPlantillaController extends Controller
{
    public function index($micrositio, $id)
    {
        $noticias = DB::table('noticias')
            ->join('categorias', 'noticias.idCategoria', '=', 'categorias.id')
            ->join('noticiasfotos', 'noticias.id', '=', 'noticiasfotos.idNoticias')
            ->join('unidadnoticia', 'noticias.id', '=', 'unidadnoticia.idNoticias')
            ->join('unidadacademica', 'unidadnoticia.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('noticias.id','noticias.titulo', 'noticias.resumen','noticias.fechaPublicacion','noticiasfotos.fotos as foto', 'unidadacademica.nombre as unidad')
            ->where('noticias.publicar','=',1)
            ->where('noticiasfotos.publicar','=',1)
            ->where('noticiasfotos.principal','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->orderBy('noticias.id', 'desc')
            ->take(5)
            ->get();

        $noticiasActual = DB::table('noticias')
            ->join('categorias', 'noticias.idCategoria', '=', 'categorias.id')
            ->join('noticiasfotos', 'noticias.id', '=', 'noticiasfotos.idNoticias')
            ->join('unidadnoticia', 'noticias.id', '=', 'unidadnoticia.idNoticias')
            ->join('unidadacademica', 'unidadnoticia.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('noticias.id','noticias.titulo','noticias.contenido', 'noticias.resumen','noticias.fechaPublicacion','noticiasfotos.fotos as foto')
            ->where('noticias.publicar','=',1)
            ->where('noticiasfotos.publicar','=',1)
            ->where('noticias.id','=',$id)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get();

        $noticiasCategoria = DB::table('noticias')
            ->join('categorias', 'noticias.idCategoria', '=', 'categorias.id')
            ->join('unidadnoticia', 'noticias.id', '=', 'unidadnoticia.idNoticias')
            ->join('unidadacademica', 'unidadnoticia.idUnidadacademica', '=', 'unidadacademica.id')
            ->select(DB::raw('count(*) as count, categorias.categoria'))
            ->where('noticias.publicar','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->groupBy('categorias.categoria')
            ->get();

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

        return view('adminlte::plantilla.noticias', compact('redesSociales', 'noticias','micrositios', 'noticiasCategoria', 'noticiasActual'));           
	}  
    public function noticiaCategoria($micrositio, $id)
    {
        $noticias = DB::table('noticias')
            ->join('categorias', 'noticias.idCategoria', '=', 'categorias.id')
            ->join('noticiasfotos', 'noticias.id', '=', 'noticiasfotos.idNoticias')
            ->join('unidadnoticia', 'noticias.id', '=', 'unidadnoticia.idNoticias')
            ->join('unidadacademica', 'unidadnoticia.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('noticias.id','noticias.titulo', 'noticias.resumen','noticias.fechaPublicacion','noticiasfotos.fotos as foto', 'unidadacademica.nombre as unidad')
            ->where('noticias.publicar','=',1)
            ->where('noticiasfotos.publicar','=',1)
            ->where('noticiasfotos.principal','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->orderBy('noticias.id', 'desc')
            ->take(5)
            ->get();

        $noticiasSelect= DB::table('noticias')
            ->join('categorias', 'noticias.idCategoria', '=', 'categorias.id')
            ->join('noticiasfotos', 'noticias.id', '=', 'noticiasfotos.idNoticias')
            ->join('unidadnoticia', 'noticias.id', '=', 'unidadnoticia.idNoticias')
            ->join('unidadacademica', 'unidadnoticia.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('noticias.id','noticias.titulo', 'noticias.fechaPublicacion','noticiasfotos.fotos as foto', 'unidadacademica.nombre as unidad')
            ->where('noticias.publicar','=',1)
            ->where('categorias.categoria','=',$id)
            ->where('noticiasfotos.principal','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->orderBy('noticias.id', 'desc')
            ->take(12)
            ->get();

        $noticiasCategoria = DB::table('noticias')
            ->join('categorias', 'noticias.idCategoria', '=', 'categorias.id')
            ->join('unidadnoticia', 'noticias.id', '=', 'unidadnoticia.idNoticias')
            ->join('unidadacademica', 'unidadnoticia.idUnidadacademica', '=', 'unidadacademica.id')
            ->select(DB::raw('count(*) as count, categorias.categoria'))
            ->where('noticias.publicar','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->groupBy('categorias.categoria')
            ->get();

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

        return view('adminlte::plantilla.noticiasCategoria', compact('redesSociales', 'noticias','micrositios', 'noticiasCategoria','noticiasSelect'));           
    }           
}
