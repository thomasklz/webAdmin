@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Slider</h3>
            </div>
            @include('adminlte::mensaje.error')
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
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
                  <input type="text" name="titulo" class="form-control" placeholder="Ingresar el título" value="{{ old('titulo') }}">
                </div>
                <div class="form-group">
                  <label>Link</label>
                  <input type="text" name="link" class="form-control" placeholder="Ingresar el link" value="{{ old('link') }}">
                </div>
                 <div class="form-group">
                  <label>Subir foto: </label>
                  <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-block btn-success">Registrar</button>
              </form>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de slider</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">#Slider</th>
                  <th>Micrositio</th>
                  <th>Título</th>
                  <th>Link</th>
                  <th>Foto</th>
                  <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $slider)
                <tr>
                  <td class="text-center">{{ $slider->id }}</td>
                  <td>{{ $slider->unidad }}</td>
                  <td>{{ $slider->titulo }}</td>
                  <td>{{ $slider->link }}</td>
                  <td>{{ $slider->foto }}</td>
                  <td class="text-center">
                    <div class="row">
                      <div class="col-md-6 text-right ">
                      <a href="#" data-route="{{route('slider.show', $slider->id)}}" data-toggle="modal" data-target="#myModal"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                      </div>
                      <div class="col-md-6 text-left">
                      {!! Form::open(['route' => ['slider.destroy', $slider->id], 'method'=>'DELETE']) !!}
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
    @include('adminlte::modal.modalSlider')
@endsection
@section('scripts-button')
<script src=" {{ asset('js/scripts/ajaxSlider.js') }}"></script>
@endsection
<!-- Left side column. contains the logo and sidebar -->

