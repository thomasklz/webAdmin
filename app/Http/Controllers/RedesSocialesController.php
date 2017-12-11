<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\RedesSociales;
use App\UnidadRedesSociales;

class RedesSocialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $redesSociales = DB::table('RedesSociales')
            ->join('unidadredessociales', 'RedesSociales.id', '=', 'unidadredessociales.idRedessociales')
            ->join('unidadacademica', 'unidadredessociales.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('RedesSociales.*', 'unidadacademica.nombre as unidad')
            ->where('RedesSociales.estado','=',1)
            ->get();           
      $unidadAcademicas = DB::table('UnidadAcademica')
                     ->where('estado','=',1)
                     ->where('id','=',auth()->user()->idUnidadacademica)
                     ->get();            
      return view('adminlte::redessociales.redesSociales', compact('redesSociales','unidadAcademicas'));
    }
    public function store(Request $request)
    {  
      $this->validate($request, [
    					 'redSocial' => 'required',
    					 'link' => 'required',
    					]);

      $redesSociales = new RedesSociales;
      $redesSociales->redSocial = $request->redSocial;
      $redesSociales->link = $request->link;
      $redesSociales->estado = 1 ;
      $redesSociales->save();

      $unidadesRedes = new UnidadRedesSociales;
      $unidadesRedes->idRedessociales = $redesSociales->id;
      $unidadesRedes->idUnidadacademica = $request->idUnidadAcademica;
      $unidadesRedes->save();
      $notification = array(
          'message' => 'Red Social registrada correctamente', 
          'alert-type' => 'success'
      );
      return redirect('redes-sociales')->with($notification);
    }
    public function destroy(Request $request, $id) 
    {
      if ($request->ajax()){
          $evento = DB::table('RedesSociales')
             ->where('id', $id)
                     ->update(['estado' => 0]);
      return response()->json(['mensaje'=> 'Red social eliminada']);
      }
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $evento = DB::table('RedesSociales')
                     ->where('id', $id)
                     ->update([
                          'redSocial' => $request->VMredSocial,
                          'link' => $request->VMlink
                         ]);
            $Unidadeventos = DB::table('UnidadRedesSociales')
                     ->where('idRedessociales', $id)
                     ->update([
                          'idUnidadacademica' => $request->unidad
                         ]);                
            return response()->json(['mensaje'=> 'Red Social actualizada']);
        }
    }
}
