<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EstadoProyecto ;

class EstadoProyectoController extends Controller
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
       return view('adminlte::proyecto.estadoProyecto', compact('estados'));
    }
    public function store(Request $request)
    {
		$this->validate($request, ['estado' => 'required|alpha']);
        $estado = new EstadoProyecto;
        $estado->nombre = $request->estado;
	    $estado->estado = 1;
	    $estado->save();
	    alertify()->success('Estado registrado correctamente')->delay(3000)->position('bottom right');
	    return redirect('estado-proyecto');
    }
    public function destroy(Request $request, $id)
    {
    	if ($request->ajax()){
			$estado = DB::table('EstadoProyecto')
    				 ->where('id', $id)
                     ->update(['estado' => 0]);
			return response()->json(['mensaje'=> 'Estado eliminado']);
    	}
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $estado = DB::table('EstadoProyecto')
                     ->where('id', $id)
                     ->update(['nombre' => $request->estado]);    
            return response()->json(['mensaje'=> 'Estado actualizado']);
        }
    } 
}
