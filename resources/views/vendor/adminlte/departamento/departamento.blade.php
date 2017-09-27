@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('css-top')
<link rel="stylesheet" href=" {{ asset('css/wizar/form-elements.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href=" {{ asset('css/wizar/style.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href=" {{ asset('css/adminlte/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar el departamento</h3>
            </div>
            @include('adminlte::mensaje.error')
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="{{ route('unidad-academica.store') }}" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <!-- text input -->
                <div class="form-group">
                  <label class="col-md-2 control-label">Micrositio</label>
                  <div class="col-md-10">
                    <input type="text" name="departamento" class="form-control" placeholder="Ingresar el departamento" value="{{ old('departamento') }}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" style="padding-top:7px;">Frase</label>
                  <div class="col-md-10" style="padding-top:7px;">
                    <input type="text" name="frase" class="form-control" placeholder="Ingresar la frase" value="{{ old('frase') }}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" style="padding-top:7px;">Resumen</label>
                  <div class="col-md-10" style="padding-top:7px;">
                    <input type="text" name="resumen" class="form-control" placeholder="Ingresar el resumen" value="{{ old('resumen') }}">
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
                  <label class="col-md-2 control-label" style="padding-top:7px;">Subir foto: </label>
                  <div class="col-md-10" style="padding-top:7px;">
                    <input type="file" name="foto" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label" style="padding-top:7px;">Subir logo: </label>
                  <div class="col-md-10" style="padding-top:7px;" >
                    <input type="file" name="logo" class="form-control">
                  </div>
                </div>
                <div class="col-md-12" style="padding-top:15px;" >
                <button type="submit" class="btn btn-block btn-success" >Registrar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de los departamentos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">#Departamento</th>
                  <th>Departamento</th>
                  <th>Frase</th>
                  <th>Logo</th>
                  <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departamentos as $departamento)
                <tr>
                  <td class="text-center">{{ $departamento->id }}</td>
                  <td>{{ $departamento->nombre }}</td>
                  <td>{{ $departamento->frase }}</td>
                  <td>{{ $departamento->logo }}</td>
                  <td class="text-center">
                    <div class="row">
                      <div class="col-md-6 text-right ">
                      <a href="#" data-resumen="{{ $departamento->resumen }}" data-contenido="{{ $departamento->contenido }}" data-foto="{{ $departamento->foto }}" data-route="{{route('unidad-academica.show', $departamento->id)}}" data-toggle="modal" data-target="#myModal"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                      </div>
                      <div class="col-md-6 text-left">
                      {!! Form::open(['route' => ['unidad-academica.destroy', $departamento->id], 'method'=>'DELETE']) !!}
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
    @include('adminlte::modal.modalDepartamento')
@endsection
@section('scripts-button')
<script src=" {{ asset('js/adminlte/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src=" {{ asset('js/wizar/jquery.backstretch.min.js') }}"></script>
<script src=" {{ asset('js/wizar/retina-1.1.0.min.js') }}"></script>
<script src=" {{ asset('js/wizar/scripts.js') }}"></script>
<script src=" {{ asset('js/scripts/ajaxDepartamento.js') }}"></script>
<script>
  $(function () {
    $('.textarea').wysihtml5()
  })
</script>
@endsection
<!-- Left side column. contains the logo and sidebar -->

