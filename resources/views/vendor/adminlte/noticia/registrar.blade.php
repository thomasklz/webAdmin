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
              <form role="form">
                 <!-- select -->
                <div class="form-group">
                  <label>Categoría</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                <!-- text input -->
                <div class="form-group">
                  <label>Título</label>
                  <input type="text" class="form-control" placeholder="Ingresar el títuo">
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Resumen</label>
                  <textarea class="form-control" rows="3" placeholder="Ingresar el resumen"></textarea>
                </div>
               <div class="form-group">
                  <label>Contenido</label>
                  <textarea class="form-control" rows="3" placeholder="Ingresar el contenido"></textarea>
                </div>
                <!-- radio -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-1">
                              <label style="padding-top: 7px;">Piblicar:</label>
                        </div>
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
                <button type="button" class="btn btn-block btn-success">Registrar</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
@endsection

<!-- Left side column. contains the logo and sidebar -->

