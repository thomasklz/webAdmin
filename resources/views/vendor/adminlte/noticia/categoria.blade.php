@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar categoria</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="{{ route('categoria.store') }}">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <!-- text input -->
                <div class="form-group">
                  <label>Categoría</label>
                  <input type="text" name="categoria" class="form-control" placeholder="Ingresar la categoria">
                </div>
                <button type="submit" class="btn btn-block btn-success">Registrar</button>
              </form>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de categorias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">#Categoria</th>
                  <th>Categoria</th>
                  <th class="text-center">Estado</th> 
                  <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                <tr>
                  <td class="text-center">{{ $categoria->id }}</td>
                  <td>{{ $categoria->categoria }}</td>
                  <td class="text-center">{{ $categoria->estado }} </td>
                  <td class="text-center">
                    <a href="#"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                    <a href="#"><span class="text-green icon"><i class='fa fa-trash-o'></i></span></a>
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
@endsection

<!-- Left side column. contains the logo and sidebar -->

