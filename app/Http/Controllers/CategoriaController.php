<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categorias;
use Response;

class CategoriaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        if (!empty($request->categoria)){
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
 
    public function show(Request $request, $id)
    {
    	if ($request->ajax()){
	    	$result = DB::table('Categorias')
	    				 ->where('id',$id)
	                     ->first();
	        return response()->json($result);
        }
        //return view('adminlte::noticia.categoria', compact('result'));

    }
    public function destroy(Request $request, $id)
    {
    	if ($request->ajax()){
			$categorias = DB::table('Categorias')
    				 ->where('id', $id)
                     ->update(['estado' => 0]);
			return response()->json(['mensaje'=> 'Cotegoría eliminada']);
    	}
    }
}


