@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('css-top')
<link rel="stylesheet" href=" {{ asset('css/adminlte/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Servicio</h3>
            </div>
            @include('adminlte::mensaje.error')
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="{{ route('servicio.store') }}" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <!-- text input -->
                <div class="form-group">
                    <label class="col-md-2  control-label">Micrositio</label>
                    <div class="col-md-10" style="padding-top:7px;">
                      <select class="form-control" name="idUnidadAcademica">
                        @foreach($unidadAcademicas as $unidadAcademica )
                        <option value="{{ $unidadAcademica->id }}">{{$unidadAcademica->nombre}}</option>
                        @endforeach
                    </select>
                   </div> 
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Título</label>
                  <div class="col-md-10" style="padding-top:7px;">
                  <input type="text" name="titulo" class="form-control" placeholder="Ingresar el título" value="{{ old('titulo') }}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" style="padding-top:7px;">Contenido</label>
                  <div class="col-md-10" style="padding-top:7px;">
                    <div class="box">
                      <div class="box-body pad">
                        <textarea class="textarea form-control" name="contenido"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        
                        </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Icono: </label>
                  <div class="col-md-10">
                   <input type="text" name="icono" class="form-control" placeholder="Ingresar nombre del icono" value="{{ old('icono') }}">
                   </div>
                </div>
                <div class="col-md-12" style="padding-top:15px;">
                <button type="submit" class="btn btn-block btn-success">Registrar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de servicios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">#Servicio</th>
                  <th>Micrositio</th>
                  <th>Título</th>
                  <th>Icono</th>
                  <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($servicios as $servicio)
                <tr>
                  <td class="text-center">{{ $servicio->id }}</td>
                  <td>{{ $servicio->unidad }}</td>
                  <td>{{ $servicio->titulo }}</td>
                  <td>{{ $servicio->foto }}</td>
                  <td class="text-center">
                    <div class="row">
                      <div class="col-md-6 text-right ">
                      <a href="#" data-contenido="{{ $servicio->contenido }}" data-route="{{route('servicio.show', $servicio->id)}}" data-toggle="modal" data-target="#myModal"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                      </div>
                      <div class="col-md-6 text-left">
                      {!! Form::open(['route' => ['servicio.destroy', $servicio->id], 'method'=>'DELETE']) !!}
                        <a href="#" class="bnt-delete"><span class="text-green icon"><i class='fa fa-trash-o'></i></span></a>
                      {!! Form::close() !!}
                      </div>
                    </div>
                  </td>
                </tr>
               @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
    @include('adminlte::modal.modalServicio')
@endsection
@section('scripts-button')
<script src=" {{ asset('js/adminlte/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src=" {{ asset('js/wizar/jquery.backstretch.min.js') }}"></script>
<script src=" {{ asset('js/wizar/retina-1.1.0.min.js') }}"></script>
<script src=" {{ asset('js/wizar/scripts.js') }}"></script>
<script src=" {{ asset('js/scripts/ajaxServicio.js') }}"></script> 
<script>
  $(function () {
    $('.textarea').wysihtml5()
  })
</script>
@endsection
<!-- Left side column. contains the logo and sidebar -->
