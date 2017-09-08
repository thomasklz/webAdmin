@extends('adminlte::layouts.app') @section('htmlheader_title') {{ trans('adminlte_lang::message.home') }} @endsection @section('main-content')
<div class="container-fluid spark-screen">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Registrar proyecto</h3>
        </div>
        @include('adminlte::mensaje.error')
        <!-- /.box-header -->
        <div class="box-body">
            <form role="form" method="post" action="{{ route('proyecto.store') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- text input -->
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
                    <label class="col-md-2 control-label" style="padding-top:7px;">Estado</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <select class="form-control" name="idEstadoproyecto">
                            @foreach($estados as $estado )
                            <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" style="padding-top:7px;">Categoría</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <select class="form-control" name="idCategoriaproyecto">
                            @foreach($categorias as $categoria )
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Autor</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="autor" value="{{ old('autor') }}" class="form-control" placeholder="Ingresar el autor">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Título</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control" placeholder="Ingresar el título">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="padding-top:7px;">Contenido</label>
                    <div class="col-sm-10" style="padding-top:7px;">
                        <textarea class="form-control" value="{{ old('contenido') }}" rows="3" name="contenido"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Foto: </label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="file" name="foto" class="form-control">
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
            <h3 class="box-title">Listado de las categorias de proyecto</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#Proyecto</th>
                        <th>Autor</th>
                        <th class="text-center">Título</th>
                        <th class="text-center">Contenido</th>
                        <th class="text-center">Unidad Academica</th>
                        <th class="text-center">Categoría</th>
                        <th class="text-center">Estado proyecto</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proyectos as $proyecto)
                    <tr>
                        <td class="text-center">{{ $proyecto->id }}</td>
                        <td>{{ $proyecto->autor }}</td>
                        <td>{{ $proyecto->titulo }}</td>
                        <td>{{ $proyecto->contenido }}</td>
                        <td class="text-center">{{ $proyecto->unidad }}</td>
                        <td class="text-center">{{ $proyecto->categoria }}</td>
                        <td class="text-center">{{ $proyecto->estado }}</td>
                        <td class="text-center">
                            <div class="row">
                                <div class="col-md-6 text-right ">
                                    <a href="#" data-route="{{route('proyecto.show', $proyecto->id)}}" data-toggle="modal" data-target="#myModal"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                                </div>
                                <div class="col-md-6 text-left">
                                    {!! Form::open(['route' => ['proyecto.destroy', $proyecto->id], 'method'=>'DELETE']) !!}
                                    <a href="#" class="bnt-delete"><span class="text-green icon"><i class='fa fa-trash-o'></i></span></a> {!! Form::close() !!}
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
@include('adminlte::modal.modalProyecto') @endsection @section('scripts-button')
<script src=" {{ asset('js/scripts/ajaxProyecto.js') }}"></script>
@endsection
<!-- Left side column. contains the logo and sidebar -->