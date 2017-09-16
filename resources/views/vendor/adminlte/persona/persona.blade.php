@extends('adminlte::layouts.app') @section('htmlheader_title') {{ trans('adminlte_lang::message.home') }} @endsection @section('main-content')
<div class="container-fluid spark-screen">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Registrar persona</h3>
        </div>
        @include('adminlte::mensaje.error')
        <!-- /.box-header -->
        <div class="box-body">
            <form role="form" method="post" action="{{ route('persona.store') }}" enctype="multipart/form-data">
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
                    <label class="col-md-2" style="padding-top:7px;">Nombre</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Ingresar el nombre">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Apellido</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control" placeholder="Ingresar el apellido">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Cédula</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" maxlength="10" name="cedula" value="{{ old('cedula') }}" class="form-control" placeholder="Ingresar la cédula">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Cargo</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text" name="cargo" value="{{ old('cargo') }}" class="form-control" placeholder="Ingresar el cargo">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Teléfono</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="text"  maxlength="10" name="telefono" value="{{ old('telefono') }}" class="form-control" placeholder="Ingresar el teléfono">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-2" style="padding-top:7px;">Email</label>
                    <div class="col-md-10" style="padding-top:7px;">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Ingresar el email">
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
            <h3 class="box-title">Listado de personas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Micrositio</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Cédula</th>
                        <th class="text-center">Cargo</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personas as $persona)
                    <tr>
                        <td class="text-center">{{ $persona->id }}</td>
                        <td class="text-center">{{ $persona->unidad }}</td>
                        <td class="text-center">{{ $persona->nombre }}</td>
                        <td class="text-center">{{ $persona->apellido }}</td>
                        <td>{{ $persona->cedula }}</td>
                        <td>{{ $persona->cargo }}</td>
                        <td>{{ $persona->telefono }}</td>
                        <td>{{ $persona->correo }}</td>
                        <td class="text-center">{{ $persona->foto }}</td>
                        <td class="text-center">
                            <div class="row">
                                <div class="col-md-6 text-right ">
                                    <a href="#" data-route="{{route('persona.show', $persona->id)}}" data-toggle="modal" data-target="#myModal"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                                </div>
                                <div class="col-md-6 text-left">
                                    {!! Form::open(['route' => ['persona.destroy', $persona->id], 'method'=>'DELETE']) !!}
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
@include('adminlte::modal.modalPersona') @endsection @section('scripts-button')
<script src=" {{ asset('js/scripts/ajaxPersona.js') }}"></script>
@endsection
<!-- Left side column. contains the logo and sidebar -->