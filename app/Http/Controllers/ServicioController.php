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
                     ->get();            
      return view('adminlte::servicio.servicio', compact('servicios','unidadAcademicas'));
    }
    public function store(Request $request)
    {  
      $this->validate($request, [
    					 'titulo' => 'required',
    					 'contenido' => 'required',
    					 'foto' => 'required|mimes:jpg,png,jpeg',
    					 'enlace' => 'required',
    					]);

      $file = $request->file('foto');
      $nombre = $file->getClientMimeType();
      $tipoImagen = str_replace('image/', '.',$nombre);
      $fileName = uniqid() .$tipoImagen ;
      $path = public_path() . '/img/servicio';
      $file->move($path, $fileName);

      $date= new \DateTime();
      $servicio = new Servicio;
      $servicio->titulo = $request->titulo;
      $servicio->contenido = $request->contenido;
      $servicio->foto = $fileName;
      $servicio->enlace = $request->enlace;
      $servicio->fecha = $date->format('Y-m-d H:i:s');
      $servicio->estado = 1 ;
      $servicio->save();

      $unidadesServicio = new UnidadServicio;
      $unidadesServicio->idServicio = $servicio->id;
      $unidadesServicio->idUnidadacademica = $request->idUnidadAcademica;
      $unidadesServicio->save();
      alertify()->success('Servicio registrado correctamente')->delay(3000)->position('bottom right');
      return redirect('servicio');
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
            $file = $request->file('foto');
            if (empty($file)){
              $fileName=$request->VMfoto;
            }else{
              $nombre = $file->getClientMimeType();
              $tipoImagen = str_replace('image/', '.',$nombre);
              $fileName = uniqid() .$tipoImagen ;
              $path = public_path() . '/img/servicio';
              $file->move($path, $fileName);
            }
            $servicio = DB::table('Servicio')
                     ->where('id', $id)
                     ->update([
                          'titulo' => $request->VMtitulo,
                          'contenido' => $request->VMcontenido,
                          'foto' => $fileName,
                          'enlace' => $request->VMenlace,
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
