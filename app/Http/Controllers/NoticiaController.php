<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categorias ;
use App\Noticia;
use App\FotosNoticias;
use App\UnidadAcademica;
use App\UnidadNoticia;

class NoticiaController extends Controller
{
   /**
     *
     * @return Response
     */
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorias = DB::table('Categorias')
                     ->where('estado','=',1)
                     ->get();
        $unidadAcademicas = DB::table('UnidadAcademica')
                     ->where('estado','=',1)
                     ->where('id','=',auth()->user()->idUnidadacademica)
                     ->get();            
       return view('adminlte::noticia.registrar', compact('unidadAcademicas','categorias'));
    }
    
    public function store(Request $request)
    {
        $date= new \DateTime();
        $noticia = new Noticia;
        $noticia->titulo = $request->titulo;
        $noticia->resumen = $request->resumen;
        $noticia->contenido = $request->contenido;
        $noticia->publicar = $request->publicar;
        $noticia->fechapublicacion = $date->format('Y-m-d H:i:s');
        $noticia->idCategoria = $request->idcategoria;
        $noticia->save();
        $contador =0;

        for ($i=1; $i <=5 ; $i++) { 
            if (!empty($request->file("foto".''.$i.''))){

                $file=$request->file("foto".''.$i.'');
                $nombre = $file->getClientMimeType();
                $tipoImagen = str_replace('image/', '.',$nombre);
                $fileName = uniqid() .$tipoImagen ;
                $path = public_path() . '/img/noticia';
                $file->move($path, $fileName);

                $fotos = new FotosNoticias;
                $fotos->fotos = $fileName;
                $fotos->principal = $_POST['principal'.$i];
                $fotos->publicar = $_POST['publicar'.$i];
                $fotos->idNoticias = $noticia->id;
                $fotos->save();
                $contador = $contador + $i; 
            }
        }
        if ($contador !=0){
            $unidadesNoticia = new UnidadNoticia;
            $unidadesNoticia->idNoticias = $noticia->id;
            $unidadesNoticia->idUnidadacademica = $request->idUnidadAcademica;
            $unidadesNoticia->save();
            $notification = array(
              'message' => 'Noticia registrada correctamente', 
              'alert-type' => 'success'
                );
            }else{
               $notification = array(
                  'message' => 'No se pudo registrar la noticia', 
                  'alert-type' => 'success'
            );
        }
        return redirect('noticia')->with($notification);
    }
    public function create()
    {            
        $categorias = DB::table('Categorias')
                     ->where('estado','=',1)
                     ->get();
        $unidadAcademicas = DB::table('UnidadAcademica')
                     ->where('estado','=',1)
                     ->get();
        $listNoticias = DB::table('Noticias')
            ->join('categorias', 'Noticias.idCategoria', '=', 'categorias.id')
            ->join('unidadnoticia', 'Noticias.id', '=', 'unidadnoticia.idNoticias')
            ->join('unidadacademica', 'unidadnoticia.idUnidadacademica', '=', 'unidadacademica.id')
            ->select('Noticias.id','Noticias.titulo','Noticias.publicar','Noticias.fechapublicacion','categorias.categoria', 'unidadacademica.nombre as unidad')
            ->take(20)
            ->get();  
       return view('adminlte::noticia.list', compact('listNoticias','unidadAcademicas','categorias'));
    }
    public function show(Request $request, $id)
    {    
        if ($request->ajax()){
            $noticia = DB::table('Noticias')
                ->join('categorias', 'Noticias.idCategoria', '=', 'categorias.id')
                ->join('unidadnoticia', 'Noticias.id', '=', 'unidadnoticia.idNoticias')
                ->join('unidadacademica', 'unidadnoticia.idUnidadacademica', '=', 'unidadacademica.id')
                ->select('Noticias.*','categorias.categoria', 'unidadacademica.nombre as unidad')
                ->where('Noticias.id','=',$id)
                ->first();  
            return response()->json([$noticia]);
        }  
    }
    public function ShowPhoto(Request $request, $id)
    {    
        if ($request->ajax()){
            $noticiaFotos = DB::table('noticiasfotos')
                ->select('noticiasfotos.id','noticiasfotos.fotos')
                ->where('idNoticias','=',$id)
                ->get();  
            return response()->json([$noticiaFotos]);
        }  
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()){
            $noticia = DB::table('Noticias')
                     ->where('id', $id)
                     ->update([
                          'titulo' => $request->VMtitulo,
                          'resumen' => $request->VMresumen,
                          'contenido' => $request->VMcontenido,
                          'publicar' => $request->VMpublicar,
                          'fechaPublicacion' => $request->VMfecha,
                          'idCategoria' => $request->VMcategoria
                         ]);
            $Unidadeventos = DB::table('UnidadNoticia')
                     ->where('idNoticias', $id)
                     ->update([
                          'idUnidadacademica' => $request->VMunidad
                         ]);                
            return response()->json(['mensaje'=> 'Noticia actualizada']);
        }
    }
    public function UpdatePhoto(Request $request, $id)
    {
        if ($request->ajax()){
            for ($i=1; $i <=5 ; $i++) { 
                if (!empty($request->file("foto".''.$i.''))){
                    $file=$request->file("foto".''.$i.'');
                    $nombre = $file->getClientMimeType();
                    $tipoImagen = str_replace('image/', '.',$nombre);
                    $fileName = uniqid() .$tipoImagen ;
                    $path = public_path() . '/img/noticia';
                    $file->move($path, $fileName);
                    $idF= $_POST['VMid'.$i];
                    $fotos = DB::table('noticiasfotos')
                         ->where('idNoticias', $id)
                         ->where('id', $idF)
                         ->update([
                              'fotos' => $fileName,
                             ]);
                }
            }               
            return response()->json(['mensaje'=> 'Noticia actualizada']);
        }
    }
}
