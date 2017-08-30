@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Subir fotos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="/upload" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  Product name:
                  <br />
                  <input type="text" name="name" />
                  <br /><br />
                  Product photos (can attach more than one):
                  <br />
                  <input type="file" name="photos[]" multiple />
                  <br /><br />
                  <input type="submit" value="Upload" />
              </form>
            </div>
        </div>
    </div>
@endsection

<!-- Left side column. contains the logo and sidebar -->

