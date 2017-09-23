@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('css-top')
  <link href="{{ asset('/css/adminlte/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Evento</h3>
            </div>
            @include('adminlte::mensaje.error')
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="{{ route('evento.store') }}" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <!-- text input -->
                <div class="form-group">
                    <label class="control-label">Micrositio</label>
                      <select class="form-control" name="idUnidadAcademica">
                        @foreach($unidadAcademicas as $unidadAcademica )
                        <option value="{{ $unidadAcademica->id }}">{{$unidadAcademica->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label>Título</label>
                  <input type="text" name="titulo" class="form-control" placeholder="Ingresar el evento" value="{{ old('titulo') }}">
                </div>
                <div class="form-group">
                  <label>Detalle</label>
                  <input type="text" name="detalle" class="form-control" placeholder="Ingresar el detalle" value="{{ old('detalle') }}">
                </div>
                <div class="form-group">
                  <label>Url</label>
                  <input type="text" name="url" class="form-control" placeholder="Ingresar la url" value="{{ old('url') }}">
                </div>
                <div class="form-group">
                  <label>Fecha</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input size="16" type="text" value="{{ old('fecha') }}" name="fecha" class="form_datetime form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label>Lugar</label>
                  <input type="text" name="lugar" class="form-control" placeholder="Ingresar el lugar" value="{{ old('lugar') }}">
                </div>
                <button type="submit" class="btn btn-block btn-success">Registrar</button>
              </form>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de enlaces</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">#Enlace</th>
                  <th>Micrositio</th>
                  <th>Título</th>
                  <th>Detalle</th>
                  <th>Url</th>
                  <th class="text-center">Fecha</th>
                  <th>Lugar</th>
                  <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($eventos as $evento)
                <tr>
                  <td class="text-center">{{ $evento->id }}</td>
                  <td>{{ $evento->unidad }}</td>
                   <td>{{ $evento->titulo }}</td>
                  <td>{{ $evento->detalle }}</td>
                  <td>{{ $evento->url }}</td>
                  <td class="text-center">{{ $evento->fecha }}</td>
                  <td>{{ $evento->lugar }}</td>
                  <td class="text-center">
                    <div class="row">
                      <div class="col-md-6 text-right ">
                      <a href="#" data-route="{{route('evento.show', $evento->id)}}" data-toggle="modal" data-target="#myModal"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                      </div>
                      <div class="col-md-6 text-left">
                      {!! Form::open(['route' => ['evento.destroy', $evento->id], 'method'=>'DELETE']) !!}
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
    @include('adminlte::modal.modalEvento')
@endsection
@section('scripts-button')
<script src=" {{ asset('js/scripts/ajaxEvento.js') }}"></script>
<script src=" {{ asset('js/adminlte/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
</script> 
@endsection
<!-- Left side column. contains the logo and sidebar -->
