<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Slider;
use App\UnidadSlider;
class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $sliders = DB::table('Slider')
            ->join('unidadslider', 'Slider.id', '=', 'unidadslider.idSlider')
            ->join('unidadacademica', 'unidadslider.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('Slider.*', 'unidadacademica.nombre as unidad')
            ->where('Slider.estado','=',1)
            ->get();           
      $unidadAcademicas = DB::table('UnidadAcademica')
                     ->where('estado','=',1)
                     ->where('id','=',auth()->user()->idUnidadacademica)
                     ->get();            
      return view('adminlte::slider.slider', compact('sliders','unidadAcademicas'));
    }
    public function store(Request $request)
    {  
      $this->validate($request, [
    					 'titulo' => 'required',
    					 'link' => 'required',
    					 'foto' => 'required|mimes:jpg,png,jpeg',
    					]);

      $file = $request->file('foto');
      $nombre = $file->getClientMimeType();
      $tipoImagen = str_replace('image/', '.',$nombre);
      $fileName = uniqid() .$tipoImagen ;
      $path = public_path() . '/img/slider';
      $file->move($path, $fileName);

      $slider = new Slider;
      $slider->titulo = $request->titulo;
      $slider->link = $request->link;
      $slider->foto = $fileName;
      $slider->estado = 1 ;
      $slider->save();

      $unidadesSlider = new UnidadSlider;
      $unidadesSlider->idSlider = $slider->id;
      $unidadesSlider->idUnidadacademica = $request->idUnidadAcademica;
      $unidadesSlider->save();
      $notification = array(
          'message' => 'Slider registrado correctamente', 
          'alert-type' => 'success'
      );
      return redirect('slider')->with($notification);
    }
    public function destroy(Request $request, $id) 
    {
      if ($request->ajax()){
          $slider = DB::table('Slider')
             ->where('id', $id)
                     ->update(['estado' => 0]);
      return response()->json(['mensaje'=> 'Slider eliminado']);
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
              $path = public_path() . '/img/slider';
              $file->move($path, $fileName);
            }
            $slider = DB::table('Slider')
                     ->where('id', $id)
                     ->update([
                          'titulo' => $request->VMtitulo,
                          'link' => $request->VMlink,
                          'foto' => $fileName
                         ]);
            $unidad = DB::table('UnidadSlider')
                     ->where('idSlider', $id)
                     ->update([
                          'idUnidadacademica' => $request->unidad
                         ]);                
            return response()->json(['mensaje'=> 'Slider actualizado']);
        }
    }
}
