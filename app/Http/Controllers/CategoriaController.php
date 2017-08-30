<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categorias;

class CategoriaController extends Controller
{
    public function index()
    {
    	$categorias = DB::table('Categorias')
                     ->orderBy('id','desc')
                     ->get();
        return view('adminlte::noticia.categoria', compact('categorias'));
    }
    public function store(Request $request)
    {
        $categoria = new Categorias;
        $categoria->categoria = $request->categoria;
        $categoria->estado = 1;
        $categoria->save();
        return redirect('categoria');
    }
}


