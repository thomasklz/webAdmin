<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    /**
     *
     * @return Response
     */
    public function registrarCategoria()
    {
        return view('adminlte::noticia.categoria');
    }
}
