@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
    <div class="container-fluid spark-screen">
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
                  <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                <tr>
                  <td class="text-center">{{ $categoria->id }}</td>
                  <td>{{ $categoria->categoria }}</td>
                  <td class="text-center">
                    <div class="row">
                      <div class="col-md-6 text-right ">
                      <a href="#" data-route="{{route('categoria.show', $categoria->id)}}" data-toggle="modal" data-target="#myModal"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                      </div>
                      <div class="col-md-6 text-left">
                      {!! Form::open(['route' => ['categoria.destroy', $categoria->id], 'method'=>'DELETE']) !!}
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
    @include('adminlte::modal.modalCategoria')
@endsection
@section('scripts-button')
<script src=" {{ asset('js/scripts/ajaxScript.js') }}"></script>
@endsection
<!-- Left side column. contains the logo and sidebar -->

