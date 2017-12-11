<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Servicio;
use App\UnidadServicio;

class ServicioController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $servicios = DB::table('Servicio')
            ->join('unidadservicio', 'Servicio.id', '=', 'unidadservicio.idServicio')
            ->join('unidadacademica', 'unidadservicio.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('Servicio.*', 'unidadacademica.nombre as unidad')
            ->where('Servicio.estado','=',1)
            ->get();           
      $unidadAcademicas = DB::table('UnidadAcademica')
                     ->where('estado','=',1)
                     ->where('id','=',auth()->user()->idUnidadacademica)
                     ->get();            
      return view('adminlte::servicio.servicio', compact('servicios','unidadAcademicas'));
    }
    public function store(Request $request)
    {  
      $this->validate($request, [
    					 'titulo' => 'required',
    					 'contenido' => 'required',
    					 'icono' => 'required'
    					]);

  

      $date= new \DateTime();
      $servicio = new Servicio;
      $servicio->titulo = $request->titulo;
      $servicio->contenido = $request->contenido;
      $servicio->foto = $request->icono;
      $servicio->fecha = $date->format('Y-m-d H:i:s');
      $servicio->estado = 1 ;
      $servicio->save();

      $unidadesServicio = new UnidadServicio;
      $unidadesServicio->idServicio = $servicio->id;
      $unidadesServicio->idUnidadacademica = $request->idUnidadAcademica;
      $unidadesServicio->save();
      $notification = array(
          'message' => 'Servicio registrado correctamente', 
          'alert-type' => 'success'
      );
      return redirect('servicio')->with($notification);
    }
    public function destroy(Request $request, $id) 
    {
      if ($request->ajax()){
          $servicio = DB::table('Servicio')
             ->where('id', $id)
                     ->update(['estado' => 0]);
      return response()->json(['mensaje'=> 'Servicio eliminado']);
      }
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $servicio = DB::table('Servicio')
                     ->where('id', $id)
                     ->update([
                          'titulo' => $request->VMtitulo,
                          'contenido' => $request->VMcontenido,
                          'foto' => $request->VMicono
                         ]);
            $unidad = DB::table('UnidadServicio')
                     ->where('idServicio', $id)
                     ->update([
                          'idUnidadacademica' => $request->unidad
                         ]);                
            return response()->json(['mensaje'=> 'Servicio actualizado']);
        }
    }
}
