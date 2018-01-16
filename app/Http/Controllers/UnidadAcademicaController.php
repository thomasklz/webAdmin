<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    	if (auth()->user()->idtipousers == 1){
        $departamentos = DB::table('UnidadAcademica')
    				 ->where('estado','=',1)
                     ->orderBy('id','desc')
                     ->get();
        return view('adminlte::departamento.departamento', compact('departamentos'));
      }else
      {
         $departamentos = DB::table('UnidadAcademica')
                     ->where('estado','=',1)
                     ->where('id','=',auth()->user()->idUnidadacademica)
                     ->orderBy('id','desc')
                     ->get();
        return view('adminlte::departamento.departamento', compact('departamentos'));
      }
    }

    public function store(Request $request)
    {
		$this->validate($request, 
			['departamento' => 'required', 
			 'logo' => 'required|mimes:jpg,png,jpeg',
             'foto' => 'required|mimes:jpg,png,jpeg',
             'frase' => 'required',
             'resumen' => 'required',
             'contenido' => 'required',]);

        $file = $request->file('logo');
        $foto = $request->file('foto');
        $nombreFoto = $foto->getClientMimeType();
        $nombre = $file->getClientMimeType();
        $tipoImagen = str_replace('image/', '.',$nombre);
        $tipofoto = str_replace('image/', '.',$nombreFoto);
        $fileName = uniqid() .$tipoImagen ;
        $fileFoto = uniqid() .$tipofoto ;
        $path = public_path() . '/img/departamentos';
        $file->move($path, $fileName);
        $foto->move($path, $fileFoto);

        $departamento = new UnidadAcademica;
        $departamento->nombre = $request->departamento;
        $departamento->logo = $fileName;
        $departamento->frase = $request->frase;
        $departamento->resumen = $request->resumen;
        $departamento->contenido = $request->contenido;
        $departamento->foto = $fileFoto;
        $departamento->colorplantilla = $request->color;
	      $departamento->estado = 1;
	      $departamento->save();
        $notification = array(
          'message' => 'Departamento registrado correctamente', 
          'alert-type' => 'success'
        );
      return redirect('unidad-academica')->with($notification);
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
            $file = $request->file('VMfoto');
            if (empty($file)){
              $fileFoto=$request->VMfotoH;
            }else{
              $nombre = $file->getClientMimeType();
              $tipoImagen = str_replace('image/', '.',$nombre);
              $fileFoto = uniqid() .$tipoImagen ;
              $path = public_path() . '/img/departamentos';
              $file->move($path, $fileFoto);
            }
            $fileL = $request->file('VMlogo');
            if (empty($fileL)){
              $fileLogo=$request->VMlogoH;
            }else{
              $nombre = $fileL->getClientMimeType();
              $tipoImagen = str_replace('image/', '.',$nombre);
              $fileLogo = uniqid() .$tipoImagen ;
              $path = public_path() . '/img/departamentos';
              $fileL->move($path, $fileLogo);
            }
            $departamento = DB::table('UnidadAcademica')
                     ->where('id', $id)
                     ->update([
                     			'nombre' => $request->VMdepartamento,
                                'frase' => $request->VMfrase,
                                'resumen' => $request->VMresumen,
                                'contenido' => $request->VMcontenido,
                                'logo' => $fileLogo,
                                'foto' => $fileFoto,
                                'colorplantilla' => $request->VMcolor
                     		 ]);   
            return response()->json(['mensaje'=> 'Departamento actualizada']);
        }
    }
}
