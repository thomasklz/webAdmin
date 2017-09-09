<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Filosofia;
use App\UnidadFilosofia;

class FilosofiaController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $filosofias = DB::table('Filosofia')
            ->join('unidadfilosofia', 'Filosofia.id', '=', 'unidadfilosofia.idFilosofia')
            ->join('unidadacademica', 'unidadfilosofia.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('Filosofia.*', 'unidadacademica.nombre as unidad')
            ->where('Filosofia.estado','=',1)
            ->get();           
      $unidadAcademicas = DB::table('UnidadAcademica')
                     ->where('estado','=',1)
                     ->get();            
      return view('adminlte::filosofia.filosofia', compact('filosofias','unidadAcademicas'));
    }
    public function store(Request $request)
    {  
      $this->validate($request, [
    					 'titulo' => 'required',
    					 'contenido' => 'required',
    					 'foto' => 'required|mimes:jpg,png,jpeg',
    					]);

      $file = $request->file('foto');
      $nombre = $file->getClientMimeType();
      $tipoImagen = str_replace('image/', '.',$nombre);
      $fileName = uniqid() .$tipoImagen ;
      $path = public_path() . '/img/filosofia';
      $file->move($path, $fileName);

      $filosofia = new Filosofia;
      $filosofia->titulo = $request->titulo;
      $filosofia->contenido = $request->contenido;
      $filosofia->foto = $fileName;
      $filosofia->estado = 1 ;
      $filosofia->save();

      $unidadesFilosofia = new UnidadFilosofia;
      $unidadesFilosofia->idFilosofia = $filosofia->id;
      $unidadesFilosofia->idUnidadacademica = $request->idUnidadAcademica;
      $unidadesFilosofia->save();
      alertify()->success('Filosofia registrado correctamente')->delay(3000)->position('bottom right');
      return redirect('filosofia');
    }
    public function destroy(Request $request, $id) 
    {
      if ($request->ajax()){
          $slider = DB::table('Filosofia')
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
              $path = public_path() . '/img/filosofia';
              $file->move($path, $fileName);
            }
            $filosofia = DB::table('Filosofia')
                     ->where('id', $id)
                     ->update([
                          'titulo' => $request->VMtitulo,
                          'contenido' => $request->VMcontenido,
                          'foto' => $fileName
                         ]);
            $Unidadfilosofia = DB::table('UnidadFilosofia')
                     ->where('idFilosofia', $id)
                     ->update([
                          'idUnidadacademica' => $request->unidad
                         ]);                
            return response()->json(['mensaje'=> 'Filosofia actualizada']);
        }
    }
}
