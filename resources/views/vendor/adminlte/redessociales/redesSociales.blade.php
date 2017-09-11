@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Redes Sociales</h3>
            </div>
            @include('adminlte::mensaje.error')
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="{{ route('redes-sociales.store') }}" enctype="multipart/form-data">
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
                  <label>Red social</label>
                  <input type="text" name="redSocial" class="form-control" placeholder="Ingresar la red social" value="{{ old('redSocial') }}">
                </div>
                <div class="form-group">
                  <label>Link</label>
                  <input type="text" name="link" class="form-control" placeholder="Ingresar el link" value="{{ old('link') }}">
                </div>
                <button type="submit" class="btn btn-block btn-success">Registrar</button>
              </form>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de redes sociales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">#RedesSociales</th>
                  <th>Micrositio</th>
                  <th>Red Social</th>
                  <th>Link</th>
                  <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($redesSociales as $redesSociale)
                <tr>
                  <td class="text-center">{{ $redesSociale->id }}</td>
                  <td>{{ $redesSociale->unidad }}</td>
                  <td>{{ $redesSociale->redSocial }}</td>
                  <td>{{ $redesSociale->link }}</td>
                  <td class="text-center">
                    <div class="row">
                      <div class="col-md-6 text-right ">
                      <a href="#" data-route="{{route('redes-sociales.show', $redesSociale->id)}}" data-toggle="modal" data-target="#myModal"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                      </div>
                      <div class="col-md-6 text-left">
                      {!! Form::open(['route' => ['redes-sociales.destroy', $redesSociale->id], 'method'=>'DELETE']) !!}
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
    @include('adminlte::modal.modalRedesSociales')
@endsection
@section('scripts-button')
<script src=" {{ asset('js/scripts/ajaxRedesSociales.js') }}"></script>
@endsection
<!-- Left side column. contains the logo and sidebar -->

