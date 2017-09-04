<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UnidadAcademica;

class UnidadAcademicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$departamentos = DB::table('UnidadAcademica')
    				 ->where('estado','=',1)
                     ->orderBy('id','desc')
                     ->get();
        return view('adminlte::departamento.departamento', compact('departamentos'));
    }

    public function store(Request $request)
    {
		$this->validate($request, 
			['departamento' => 'required|alpha', 
			 'logo' => 'required|mimes:jpg,png,jpeg']);
        $file = $request->file('logo');
        $nombre = $file->getClientMimeType();
        $tipoImagen = str_replace('image/', '.',$nombre);
        $fileName = uniqid() .$tipoImagen ;
        $path = public_path() . '/img/departamentos';
        $file->move($path, $fileName);
        $departamento = new UnidadAcademica;
        $departamento->nombre = $request->departamento;
        $departamento->logo = $fileName;
	    $departamento->estado = 1;
	    $departamento->save();
	    alertify()->success('Departamento registrado')->delay(3000)->position('bottom right');
	    return redirect('unidad-academica');
    }
    public function destroy(Request $request, $id)
    {
    	if ($request->ajax()){
			$departamento = DB::table('UnidadAcademica')
    				 ->where('id', $id)
                     ->update(['estado' => 0]);
			return response()->json(['mensaje'=> 'Departamento eliminado']);
    	}
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $departamento = DB::table('UnidadAcademica')
                     ->where('id', $id)
                     ->update([
                     			'nombre' => $request->departamento
                     		 ]);   
            return response()->json(['mensaje'=> 'Departamento actualizada']);
        }
    }
}
