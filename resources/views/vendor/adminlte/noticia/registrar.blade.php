@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('css-top')
<link rel="stylesheet" href=" {{ asset('css/wizar/form-elements.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href=" {{ asset('css/wizar/style.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href=" {{ asset('css/adminlte/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" >
<style type="text/css">
 
.fila-base{ display: none; } /* fila base oculta */
.eliminar{ cursor: pointer; color: #000; }

</style>
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
      <div class="row">
        <div class="col-md-12">
           {!! Form::open(['route' => ['noticia.store'], 'method'=>'POST', 'class'=>'f1', 'files'=>True]) !!}
            <h3>Registrar noticias</h3>
            <p>Ingresar toda la información necesaria para publicar la noticia</p>
            <div class="f1-steps">
              <div class="f1-progress"> 
                <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
              </div>
              <div class="f1-step active">
                <div class="f1-step-icon" style="padding-left: 10px;"><i class="fa fa-newspaper-o"></i></div>
                <p>Noticia</p>
              </div>
              <div class="f1-step">
                <div class="f1-step-icon" style="padding-left: 12px;"><i class="fa fa-photo"></i></div>
                <p>account</p>
              </div>
            </div>
            <fieldset>
              <h4>Datos de la noticia</h4>
              <br>
              <div class="form-group">
                <label class="col-md-2 control-label">Unidad Académica</label>
                <div class="col-md-10">
                  <select class="form-control" name="idUnidadAcademica">
                   @foreach($unidadAcademicas as $unidadAcademica )
                    <option value="{{ $unidadAcademica->id }}">{{ $unidadAcademica->nombre }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" >Categoría</label>
                <div class="col-md-10" style="padding-top:7px;">
                  <select class="form-control" name="idcategoria">
                   @foreach($categorias as $categoria )
                    <option value="{{ $categoria->id }}" >{{ $categoria->categoria }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- text input -->
              <div class="form-group" >
                <label class="col-sm-2 control-label" style="padding-top:7px;">Título</label>
                <div class="col-sm-10" style="padding-top:7px;">
                  <input type="text" class="form-control" name="titulo">
                </div>
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label class="col-sm-2 control-label" style="padding-top:7px;">Resumen</label>
                <div class="col-sm-10" style="padding-top:7px;">
                  <textarea class="form-control" rows="3" name="resumen"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" style="padding-top:7px;">Contenido</label>
                <div class="col-sm-10" style="padding-top:7px;">
                  <div class="box">
                    <div class="box-body pad">
                      <textarea class="textarea form-control" name="contenido"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    
                    </div>
                  </div>
                </div>
              </div>
              <!-- radio -->
              <div class="form-group">
                <div class="row" style="padding-top:7px;">
                  <label class="col-sm-2 control-label" style="padding-top: 7px;">Publicar:</label>
                  <div class="col-sm-10">
                    <div class="col-md-1">
                      <div class="radio">
                        <label>
                          <input type="radio" name="publicar" value="1" checked="">
                          Si
                        </label>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="radio">
                        <label>
                          <input type="radio" name="publicar" value="0">
                          No
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="f1-buttons">
                  <button type="button" class="btn btn-next">Next</button>
              </div>
            </fieldset>
            <fieldset>
              <h4>Agregar fotos a la noticia (max 5)</h4>
              <table id="tabla" class="table table-bordered table-striped">
                <!-- Cabecera de la tabla -->
                <thead>
                  <tr>
                    <th>Foto</th>
                    <th class="text-center">Publicar</th>
                    <th class="text-center">Principal</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <!-- Cuerpo de la tabla con los campos -->
                <tbody>
                  <!-- fila base para clonar y agregar al final -->
                  <tr class="fila-base">
                    <td>
                      <div class="form-group">
                        <input type="file" name="foto5" id="foto" class="form-control">
                      </div>
                    </td>
                    <td class="text-center">
                     <select class="publicarFoto" id="publicar" name="publicar5">
                        <option value="1">Si</option>
                        <option value="0">No</option>
                      </select>
                    </td>
                    <td class="text-center">
                      <select class="principalFoto" id="principal" name="principal5" >
                        <option value="0">No</option>
                        <option value="1">Si</option>
                      </select>
                    </td>
                    <td  class="eliminar text-center">Eliminar</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group">
                        <input type="file" name="foto4" class="form-control">
                      </div>
                    </td>
                    <td class="text-center">
                     <select class="publicar" name="publicar4">
                        <option value="1" selected>Si</option>
                        <option value="0">No</option>
                      </select>
                    </td>
                    <td class="text-center">
                      <select class="principal" name="principal4">
                        <option value="0" selected>No</option>
                        <option value="1">Si</option>
                      </select>
                    </td>
                    <td class="eliminar text-center">Eliminar</td>
                  </tr>
                  <!-- fin de código: fila base -->
                </tbody>
              </table>
              <input type="button" id="agregar" value="Nueva foto" class="btn btn-primary" />
              <div class="f1-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="submit" class="btn btn-submit">Publicar</button>
              </div>
            </fieldset>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
@endsection
@section('scripts-button')
<script src=" {{ asset('js/adminlte/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src=" {{ asset('js/wizar/jquery.backstretch.min.js') }}"></script>
<script src=" {{ asset('js/wizar/retina-1.1.0.min.js') }}"></script>
<script src=" {{ asset('js/wizar/scripts.js') }}"></script>
<script src=" {{ asset('js/scripts/registerPhoto.js') }}"></script>
<script>
  $(function () {
    $('.textarea').wysihtml5()
  })
</script>
@endsection
<!-- Left side column. contains the logo and sidebar -->

