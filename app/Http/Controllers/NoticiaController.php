<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categorias ;
use App\Noticia;

class NoticiaController extends Controller
{
   /**
     *
     * @return Response
     */
    public function index()
    {
        $categorias = DB::table('Categorias')
                     ->where('estado','=',1)
                     ->get();
       //$categorias = DB::table('Categorias')->pluck('categoria', 'id');
       return view('adminlte::noticia.registrar', compact('categorias'));
    }
    
     public function store(Request $request)
    {
       // $this->validate($request, ['categoria' => 'required|alpha']);
        $date= new \DateTime();
       print_r($request->foto);
        die();
        $noticia = new Noticia;
        $noticia->titulo = $request->titulo;
        $noticia->resumen = $request->resumen;
        $noticia->contenido = $request->contenido;
        $noticia->publicar = $request->publicar;
        $noticia->fechapublicacion = $date->format('Y-m-d H:i:s');
        $noticia->idCategoria = $request->idcategoria;
        $noticia->save();
        alertify()->success('Noticia registrada correctamente')->delay(3000)->position('bottom right');
        return redirect('noticia');
    }
    public function registrarFotos()
    {
        return view('adminlte::noticia.fotos');
    }
}
