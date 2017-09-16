<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UnidadPersona;
use App\Persona;

class PersonaController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $unidadAcademicas = DB::table('UnidadAcademica')
                     ->where('estado','=',1)
                     ->get(); 
        $personas = DB::table('Persona')
            ->join('personaunidad', 'Persona.id', '=', 'personaunidad.idPersona')
            ->join('unidadacademica', 'personaunidad.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('Persona.*', 'unidadacademica.nombre as unidad')
            ->where('Persona.estado','=',1)
            ->get();           
       return view('adminlte::persona.persona', compact('unidadAcademicas','personas'));
    }
    public function store(Request $request)
    {  
      $this->validate($request, [
    					 'nombre' => 'required',
    					 'apellido' => 'required',
    					 'cedula' => 'required',
    					 'cargo' => 'required',
    					 'telefono' => 'required',
    					 'email' => 'required',
    					 'foto' => 'required|mimes:jpg,png,jpeg',
    					]);

      $file = $request->file('foto');
      $nombre = $file->getClientMimeType();
      $tipoImagen = str_replace('image/', '.',$nombre);
      $fileName = uniqid() .$tipoImagen ;
      $path = public_path() . '/img/persona';
      $file->move($path, $fileName);

      $persona = new Persona;
      $persona->nombre = $request->nombre;
      $persona->apellido = $request->apellido;
      $persona->cedula= $request->cedula;
      $persona->cargo = $request->cargo;
      $persona->telefono = $request->telefono;
      $persona->correo= $request->email;
      $persona->foto = $fileName;
      $persona->estado = 1 ;
      $persona->save();

      $unidadesPersona = new UnidadPersona;
      $unidadesPersona->idPersona = $persona->id;
      $unidadesPersona->idUnidadacademica = $request->idUnidadAcademica;
      $unidadesPersona->save();
      alertify()->success('Persona registrada correctamente')->delay(3000)->position('bottom right');
      return redirect('persona');
    }
}
