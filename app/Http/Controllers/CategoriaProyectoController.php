<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CategoriaProyecto ;

class CategoriaProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorias = DB::table('CategoriaProyecto')
                     ->where('estado','=',1)
                     ->get();
       return view('adminlte::proyecto.categoriaProyecto', compact('categorias'));
    }
    public function store(Request $request)
    {
		$this->validate($request, ['categoria' => 'required|alpha']);
        $categoria = new CategoriaProyecto;
        $categoria->categoria = $request->categoria;
	    $categoria->estado = 1;
	    $categoria->save();
	    alertify()->success('Categoria registrada correctamente')->delay(3000)->position('bottom right');
	    return redirect('categoria-proyecto');
    }
    public function destroy(Request $request, $id)
    {
    	if ($request->ajax()){
			$categorias = DB::table('CategoriaProyecto')
    				 ->where('id', $id)
                     ->update(['estado' => 0]);
			return response()->json(['mensaje'=> 'Cotegoría eliminada']);
    	}
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $categorias = DB::table('CategoriaProyecto')
                     ->where('id', $id)
                     ->update(['categoria' => $request->categoria]);    
            return response()->json(['mensaje'=> 'Cotegoría actualizada']);
        }
    } 
}
