<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EstadoProyecto;
use App\CategoriaProyecto;
use App\Proyecto;

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
        $categorias = DB::table('CategoriaProyecto')
                     ->where('estado','=',1)
                     ->get();            
       return view('adminlte::proyecto.proyecto', compact('estados','categorias'));
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
        $proyecto->foto = $request->fileName;
        $proyecto->fecha = $date->format('Y-m-d H:i:s');
        $proyecto->estado = 1 ;
        $proyecto->idCategoriaproyecto = $request->idCategoriaproyecto;
        $proyecto->idEstadoproyecto = $request->idEstadoproyecto;
        $proyecto->save();

        //$contador =0;
       // for ($i=1; $i <=5 ; $i++) { 
       //     if (!empty($_POST['foto'.$i])){
      //          $fotos = new FotosNoticias;
       //         $fotos->fotos = $_POST['foto'.$i];
       //         $fotos->principal = $_POST['principal'.$i];
       //         $fotos->publicar = $_POST['publicar'.$i];
       //         $fotos->idNoticias = $noticia->id;
       //         $fotos->save();
        //        $contador = $contador + $i; 
        //    }
       // }
       // if ($contador !=0){
        //    $unidadesNoticia = new UnidadNoticia;
        //    $unidadesNoticia->idNoticias = $noticia->id;
        //    $unidadesNoticia->idUnidadacademica = $request->idUnidadAcademica;
       //     $unidadesNoticia->save();
            alertify()->success('Proyecto registrado correctamente')->delay(3000)->position('bottom right');
      // }else{
       //     alertify()->error('No se pudo registrar la noticia')->delay(3000)->position('bottom right');
       // }
        return redirect('proyecto');
    }
}
