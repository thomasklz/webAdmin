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
		$this->validate($request, ['categoria' => 'required|alpha']);
        $categoria = new Categorias;
        $categoria->categoria = $request->categoria;
	    $categoria->estado = 1;
	    $categoria->save();
        $notification = array(
          'message' => 'Categoria registrada correctamente', 
          'alert-type' => 'success'
        );
      return redirect('categoria')->with($notification);
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
    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $categorias = DB::table('Categorias')
                     ->where('id', $id)
                     ->update(['categoria' => $request->categoria]);    
            return response()->json(['mensaje'=> 'Cotegoría actualizada']);
        }
    }
}


