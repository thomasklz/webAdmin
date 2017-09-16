@extends('adminlte::layouts.app') @section('htmlheader_title') {{ trans('adminlte_lang::message.home') }} @endsection @section('main-content')
<div class="container-fluid spark-screen">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Registrar documento</h3>
        </div>
        @include('adminlte::mensaje.error')
        <!-- /.box-header -->
        <div class="box-body">
            <form role="form" method="post" action="{{ route('documento.store') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- text input -->
                <div class="form-group">
                    <label class="col-md-2 control-label">Micrositio</label>
                    <div class="col-md-10">
                        <select class="form-control" name="idUnidadAcademica">
                            @foreach($unidadAcademicas as $unidadAcademica )
                            <option value="{{ $unidadAcademica->id }}">{{ $unidadAcademica->nombre }}</option>
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
                    <label class="col-md-2" style="padding-top:7px;">Nombre documento</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="file" name="nombre" class="form-control">
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
            <h3 class="box-title">Listado de documento</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#Documento</th>
                        <th class="text-center">Micrositio</th>
                        <th class="text-center">Categoria</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documentos as $documento)
                    <tr>
                        <td class="text-center">{{ $documento->id }}</td>
                        <td class="text-center">{{ $documento->unidad }}</td>
                        <td class="text-center">{{ $documento->categoria }}</td>
                        <td class="text-center">{{ $documento->nombre }}</td>
                        <td class="text-center">{{ $documento->fecha }}</td>
                        <td class="text-center">
                            <div class="row">
                                <div class="col-md-6 text-right ">
                                    <a href="#" data-route="{{route('documento.show', $documento->id)}}" data-toggle="modal" data-target="#myModal"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                                </div>
                                <div class="col-md-6 text-left">
                                    {!! Form::open(['route' => ['documento.destroy', $documento->id], 'method'=>'DELETE']) !!}
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
@include('adminlte::modal.modalDocumento') @endsection @section('scripts-button')
<script src=" {{ asset('js/scripts/ajaxDocumento.js') }}"></script>
@endsection
<!-- Left side column. contains the logo and sidebar -->