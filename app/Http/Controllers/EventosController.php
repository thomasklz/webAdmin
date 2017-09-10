<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Eventos;
use App\UnidadEventos;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $eventos = DB::table('Eventos')
            ->join('unidadeventos', 'Eventos.id', '=', 'unidadeventos.idEvento')
            ->join('unidadacademica', 'unidadeventos.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('Eventos.*', 'unidadacademica.nombre as unidad')
            ->where('Eventos.estado','=',1)
            ->get();           
      $unidadAcademicas = DB::table('UnidadAcademica')
                     ->where('estado','=',1)
                     ->get();            
      return view('adminlte::evento.evento', compact('eventos','unidadAcademicas'));
    }
    public function store(Request $request)
    {  
      $this->validate($request, [
    					 'titulo' => 'required|max:200',
    					 'detalle' => 'required|max:250',
    					 'fecha' => 'required',
    					 'url' => 'required',
    					 'lugar' => 'required',
    					]);
      $date= new \DateTime($request->fecha);
      $eventos = new Eventos;
      $eventos->titulo = $request->titulo;
      $eventos->detalle = $request->detalle;
      $eventos->url =$request->url;
      $eventos->fecha = $date->format('Y-m-d H:i:s');
      $eventos->lugar = $request->lugar;
      $eventos->estado = 1 ;
      $eventos->save();

      $unidadesEvento = new UnidadEventos;
      $unidadesEvento->idEvento = $eventos->id;
      $unidadesEvento->idUnidadacademica = $request->idUnidadAcademica;
      $unidadesEvento->save();
      alertify()->success('Evento registrado correctamente')->delay(3000)->position('bottom right');
      return redirect('evento');
    }
    public function destroy(Request $request, $id) 
    {
      if ($request->ajax()){
          $evento = DB::table('Eventos')
             ->where('id', $id)
                     ->update(['estado' => 0]);
      return response()->json(['mensaje'=> 'Evento eliminada']);
      }
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()){
        	$date= new \DateTime($request->VMfecha);
            $evento = DB::table('Eventos')
                     ->where('id', $id)
                     ->update([
                          'titulo' => $request->VMtitulo,
                          'detalle' => $request->VMdetalle,
                          'url' => $request->VMurl,
                          'fecha' => $date->format('Y-m-d H:i:s'),
                          'lugar' => $request->VMlugar
                         ]);
            $Unidadeventos = DB::table('UnidadEventos')
                     ->where('idEvento', $id)
                     ->update([
                          'idUnidadacademica' => $request->unidad
                         ]);                
            return response()->json(['mensaje'=> 'Evento actualizado']);
        }
    }
}
