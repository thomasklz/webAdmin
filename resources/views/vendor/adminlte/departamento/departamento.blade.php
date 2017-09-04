@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
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
                  <label>Nombre del departamento</label>
                  <input type="text" name="departamento" class="form-control" placeholder="Ingresar el departamento" value="{{ old('departamento') }}">
                </div>
                 <div class="form-group">
                  <label>Subir logo: </label>
                  <input type="file" name="logo" class="form-control" file-model="ddddd.jpg" ng-model="identidad.logo">
                </div>
                <button type="submit" class="btn btn-block btn-success">Registrar</button>
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
                  <th>Logo</th>
                  <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departamentos as $departamento)
                <tr>
                  <td class="text-center">{{ $departamento->id }}</td>
                  <td>{{ $departamento->nombre }}</td>
                  <td>{{ $departamento->logo }}</td>
                  <td class="text-center">
                    <div class="row">
                      <div class="col-md-6 text-right ">
                      <a href="#" data-route="{{route('unidad-academica.show', $departamento->id)}}" data-toggle="modal" data-target="#myModal"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
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
<script src=" {{ asset('js/scripts/ajaxDepartamento.js') }}"></script>
@endsection
<!-- Left side column. contains the logo and sidebar -->

