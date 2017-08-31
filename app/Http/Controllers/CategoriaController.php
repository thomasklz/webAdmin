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
    				 ->where('estado','=',1)
                     ->orderBy('id','desc')
                     ->get();
        return view('adminlte::noticia.categoria', compact('categorias'));

    }
    public function store(Request $request)
    {
        $categoria = new Categorias;
        if (!empty($request->categoriaar)){
	        $categoria->categoria = $request->categoria;
	        $categoria->estado = 1;
	        $categoria->save();
	        alertify()->success('Categoria registrada correctamente')->delay(3000)->position('bottom right');
	        return redirect('categoria');
    	}else{
    		 alertify()->error('No se permiten valores nulos')->delay(3000)->position('bottom right');
    		 return redirect('categoria');
    	}
        
    }
    public function destroy()
    {
    	$categorias = DB::table('Categorias')
    				 ->where('estado','=',1)
                     ->orderBy('id','desc')
                     ->get();
        return view('adminlte::noticia.categoria', compact('categorias'));

    }
}


