<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CategoriaDocumento;
use App\Documento;
use App\UnidadDocumento;
use App\UnidadAcademica;
use Response;

class DocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $documentos = DB::table('Documento')
            ->join('categoriadocumento', 'Documento.idCategoriadocumento', '=', 'categoriadocumento.id')
            ->join('unidaddocumento', 'Documento.id', '=', 'unidaddocumento.idDocumento')
            ->join('unidadacademica', 'unidaddocumento.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('Documento.*', 'categoriadocumento.categoria', 'unidadacademica.nombre as unidad')
            ->where('Documento.estado','=',1)
            ->get();            
      $categorias = DB::table('CategoriaDocumento')
                     ->where('estado','=',1)
                     ->get();
      $unidadAcademicas = DB::table('UnidadAcademica')
                     ->where('estado','=',1)
                     ->get();            
      return view('adminlte::documento.documento', compact('categorias', 'unidadAcademicas','documentos'));
    }
    public function store(Request $request)
    {
        
      $this->validate($request, [
    					 'nombre' => 'required',
    					]);
      $file = $request->file('nombre');
      $fileName = $file->getClientOriginalName();
      $path = public_path() . '/documentos';
      $file->move($path, $fileName);

      $date= new \DateTime();
      $documento = new Documento;
      $documento->nombre = $fileName;
      $documento->fecha = $date->format('Y-m-d');
      $documento->estado = 1 ;
      $documento->idCategoriadocumento = $request->idCategoriaproyecto;
      $documento->save();

      $unidadesDocumento = new UnidadDocumento;
      $unidadesDocumento->idDocumento = $documento->id;
      $unidadesDocumento->idUnidadacademica = $request->idUnidadAcademica;
      $unidadesDocumento->save();
      alertify()->success('Documento registrado correctamente')->delay(3000)->position('bottom right');
      return redirect('documento');
    }
    public function destroy(Request $request, $id) 
    {
      if ($request->ajax()){
          $documento = DB::table('Documento')
             ->where('id', $id)
                     ->update(['estado' => 0]);
      return response()->json(['mensaje'=> 'Documento eliminado']);
      }
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $file = $request->file('VMnombre');
            if (empty($file)){
                $fileName = $request->NameDocumento;
            }else{             
                $fileName = $file->getClientOriginalName();
                $path = public_path() . '/documentos';
                $file->move($path, $fileName);
            }
            $documento = DB::table('Documento')
                     ->where('id', $id)
                     ->update([
                          'nombre' => $fileName,
                          'idCategoriadocumento' => $request->VMcategoria
                         ]);
            $unidad = DB::table('UnidadDocumento')
                     ->where('idDocumento', $id)
                     ->update([
                          'idUnidadacademica' => $request->idUnidadAcademica
                         ]);                
            return response()->json(['mensaje'=> 'Documento actualizado']);
        }
    }
}
