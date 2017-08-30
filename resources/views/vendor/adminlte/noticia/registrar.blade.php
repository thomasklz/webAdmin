@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar noticia</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" class="form-horizontal">
                 <!-- select -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Categoría</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option>option 1</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                      <option>option 5</option>
                    </select>
                  </div>
                </div>
                <!-- text input -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Título</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" placeholder="Ingresar el títuo">
                  </div>
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Resumen</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" placeholder="Ingresar el resumen"></textarea>
                  </div>
                </div>
               <div class="form-group">
                  <label class="col-sm-2 control-label">Contenido</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" rows="3" placeholder="Ingresar el contenido"></textarea>
                  </div>
                </div>
                <!-- radio -->
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label" style="padding-top: 7px;">Publicar:</label>
                        <div class="col-sm-10">
                          <div class="col-md-1">
                              <div class="radio">
                                  <label>
                                    <input type="radio" name="radio1" value="option1" checked="">
                                    Si
                                  </label>
                              </div>
                          </div>
                          <div class="col-md-1">
                              <div class="radio">
                                  <label>
                                    <input type="radio" name="radio1" value="option1">
                                    No
                                  </label>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-10">
                <button type="button" class="btn btn-block btn-success">Registrar</button>
                </div>
              </form>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de noticias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#Noticia</th>
                  <th>Título</th>
                  <th>Publicar</th>
                  <th>Fecha Publicación</th>
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

