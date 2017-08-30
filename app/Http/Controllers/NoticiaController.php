<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias as Categoria;

class NoticiaController extends Controller
{
   /**
     *
     * @return Response
     */
    public function registrarNoticia()
    {
        return view('adminlte::noticia.registrar');
    }
    
    
    public function registrarFotos()
    {
        return view('adminlte::noticia.fotos');
    }
}
