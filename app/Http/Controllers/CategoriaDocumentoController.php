<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CategoriaDocumento;

class CategoriaDocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorias = DB::table('CategoriaDocumento')
                     ->where('estado','=',1)
                     ->get();
       return view('adminlte::documento.categoria', compact('categorias'));
    }
    public function store(Request $request)
    {
		$this->validate($request, ['categoria' => 'required']);
        $categoria = new CategoriaDocumento;
        $categoria->categoria = $request->categoria;
	    $categoria->estado = 1;
	    $categoria->save();
	    alertify()->success('Categoria registrada correctamente')->delay(3000)->position('bottom right');
	    return redirect('categoria-documento');
    }
    public function destroy(Request $request, $id)
    {
    	if ($request->ajax()){
			$categorias = DB::table('CategoriaDocumento')
    				 ->where('id', $id)
                     ->update(['estado' => 0]);
			return response()->json(['mensaje'=> 'Categoría eliminada']);
    	}
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $categorias = DB::table('CategoriaDocumento')
                     ->where('id', $id)
                     ->update(['categoria' => $request->categoria]);    
            return response()->json(['mensaje'=> 'Categoría actualizada']);
        }
    } 
}
