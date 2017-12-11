<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Enlace;
use App\UnidadEnlace;

class EnlaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $enlaces = DB::table('Enlace')
            ->join('unidadenlace', 'Enlace.id', '=', 'unidadenlace.idEnlace')
            ->join('unidadacademica', 'unidadenlace.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('Enlace.*', 'unidadacademica.nombre as unidad')
            ->where('Enlace.estado','=',1)
            ->get();           
      $unidadAcademicas = DB::table('unidadacademica')
                     ->where('estado','=',1)
                     ->where('id','=',auth()->user()->idUnidadacademica)
                     ->get();            
      return view('adminlte::enlace.enlace', compact('enlaces','unidadAcademicas'));
    }
    public function store(Request $request)
    {  
      $this->validate($request, [
    					 'titulo' => 'required',
    					 'ruta' => 'required',
    					 'foto' => 'required|mimes:jpg,png,jpeg',
    					]);

      $file = $request->file('foto');
      $nombre = $file->getClientMimeType();
      $tipoImagen = str_replace('image/', '.',$nombre);
      $fileName = uniqid() .$tipoImagen ;
      $path = public_path() . '/img/enlaces';
      $file->move($path, $fileName);

      $enlace = new Enlace;
      $enlace->titulo = $request->titulo;
      $enlace->ruta = $request->ruta;
      $enlace->logo = $fileName;
      $enlace->estado = 1 ;
      $enlace->save();

      $unidadesEnlace = new UnidadEnlace;
      $unidadesEnlace->idEnlace = $enlace->id;
      $unidadesEnlace->idUnidadacademica = $request->idUnidadAcademica;
      $unidadesEnlace->save();
    // alertify()->success('Enlace registrado correctamente')->delay(3000)->position('bottom right');
      $notification = array(
          'message' => 'Enlace registrado correctamente', 
          'alert-type' => 'success'
        );
      return redirect('enlace')->with($notification);
    }
    public function destroy(Request $request, $id) 
    {
      if ($request->ajax()){
          $slider = DB::table('Enlace')
             ->where('id', $id)
                     ->update(['estado' => 0]);
      return response()->json(['mensaje'=> 'Filosofia eliminada']);
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
              $path = public_path() . '/img/enlaces';
              $file->move($path, $fileName);
            }
            $filosofia = DB::table('Enlace')
                     ->where('id', $id)
                     ->update([
                          'titulo' => $request->VMtitulo,
                          'ruta' => $request->VMruta,
                          'logo' => $fileName
                         ]);
            $Unidadfilosofia = DB::table('UnidadEnlace')
                     ->where('idEnlace', $id)
                     ->update([
                          'idUnidadacademica' => $request->unidad
                         ]);                
            return response()->json(['mensaje'=> 'Enlace actualizado']);
        }
    }
}
