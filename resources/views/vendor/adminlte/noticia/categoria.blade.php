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
              <form role="form">
                 <!-- text input -->
                <div class="form-group">
                  <label>Categoría</label>
                  <input type="text" class="form-control" placeholder="Ingresar la categoria">
                </div>
                <button type="button" class="btn btn-block btn-success">Registrar</button>
              </form>
            </div>
            <!-- /.box-body -->
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
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td class="text-center">
                    <a href="#"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                    <a href="#"><span class="text-green icon"><i class='fa fa-trash-o'></i></span></a>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td class="text-center">
                    <a href="#"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                    <a href="#"><span class="text-green icon"><i class='fa fa-trash-o'></i></span></a>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Win 95+</td>
                  <td>5.5</td>
                  <td class="text-center">
                    <a href="#"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                    <a href="#"><span class="text-green icon"><i class='fa fa-trash-o'></i></span></a>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
@endsection

<!-- Left side column. contains the logo and sidebar -->

