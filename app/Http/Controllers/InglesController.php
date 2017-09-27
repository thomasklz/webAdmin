<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class InglesController extends Controller
{
    public function index($micrositio)
    {
        $micrositios = DB::table('unidadacademica')
            ->select('unidadacademica.*')
            ->where('estado','=',1)
            ->where('nombre','=',$micrositio)
            ->get(); 

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

        $servicios = DB::table('servicio')
            ->join('unidadservicio', 'servicio.id', '=', 'unidadservicio.idServicio')
            ->join('unidadacademica', 'unidadservicio.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('servicio.*')
            ->where('servicio.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->orderBy('servicio.id', 'desc')
            ->take(4)
            ->get();  

        $eventos = DB::table('eventos')
            ->join('unidadeventos', 'eventos.id', '=', 'unidadeventos.idEvento')
            ->join('unidadacademica', 'unidadeventos.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('eventos.*')
            ->where('eventos.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->orderBy('eventos.fecha','asc')
            ->get();  

        $personas = DB::table('persona')
            ->join('personaunidad', 'persona.id', '=', 'personaunidad.idPersona')
            ->join('unidadacademica', 'personaunidad.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('persona.nombre','persona.apellido','persona.cargo','persona.correo','persona.foto')
            ->where('persona.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get();

        $redesSociales = DB::table('redessociales')
            ->join('unidadredessociales', 'redessociales.id', '=', 'unidadredessociales.idRedessociales')
            ->join('unidadacademica', 'unidadredessociales.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('redessociales.*')
            ->where('redessociales.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get();  

        $noticias = DB::table('noticias')
            ->join('categorias', 'noticias.idCategoria', '=', 'categorias.id')
            ->join('noticiasfotos', 'noticias.id', '=', 'noticiasfotos.idNoticias')
            ->join('unidadnoticia', 'noticias.id', '=', 'unidadnoticia.idNoticias')
            ->join('unidadacademica', 'unidadnoticia.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('noticias.id','noticias.titulo', 'noticias.resumen','noticias.fechaPublicacion','noticiasfotos.fotos as foto' )
            ->where('noticias.publicar','=',1)
            ->where('noticiasfotos.publicar','=',1)
            ->where('noticiasfotos.principal','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->orderBy('noticias.fechaPublicacion','asc')
            ->get();

        $categoriasproyecto = DB::table('categoriaproyecto')
            ->select('categoriaproyecto.*')
            ->where('categoriaproyecto.estado','=',1)

            ->get(); 
        
        $proyectos = DB::table('proyecto')
            ->join('categoriaproyecto', 'proyecto.idCategoriaproyecto', '=', 'categoriaproyecto.id')
            ->join('estadoproyecto', 'proyecto.idEstadoproyecto', '=', 'estadoproyecto.id')
            ->join('unidadproyecto', 'proyecto.id', '=', 'unidadproyecto.idProyecto')
            ->join('unidadacademica', 'unidadproyecto.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('proyecto.foto','proyecto.fecha', 'proyecto.autor',  'categoriaproyecto.categoria', 'estadoproyecto.nombre as estado')
            ->where('proyecto.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get(); 

        $documentos = DB::table('documento')
            ->join('categoriadocumento', 'documento.idCategoriadocumento', '=', 'categoriadocumento.id')
            ->join('unidaddocumento', 'documento.id', '=', 'unidaddocumento.idDocumento')
            ->join('unidadacademica', 'unidaddocumento.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('documento.nombre', 'documento.fecha','categoriadocumento.categoria')
            ->where('documento.estado','=',1)
            ->where('unidadacademica.nombre','=',$micrositio)
            ->get(); 

        return view('adminlte::plantilla.home', compact('sliders', 'filosofias','servicios', 'eventos','noticias','personas','categoriasproyecto', 'proyectos','documentos','redesSociales', 'micrositios'));
    }
}
