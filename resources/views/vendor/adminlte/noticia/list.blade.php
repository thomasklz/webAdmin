@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection
@section('css-top')
  <link href="{{ asset('/css/adminlte/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href=" {{ asset('css/adminlte/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" >
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
                  <th class="text-center">#</th>
                  <th class="text-center">Micrositio</th>
                  <th class="text-center">Categoría</th>
                  <th>Título</th>
                  <th class="text-center">Publicar</th>
                  <th class="text-center">F_Publicación</th>
                  <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listNoticias as $listNoticia)
                <tr>
                  <td class="text-center">{{ $listNoticia->id }}</td>
                  <td class="text-center">{{ $listNoticia->unidad }}</td>
                  <td class="text-center">{{ $listNoticia->categoria }}</td>
                  <td>{{ $listNoticia->titulo }}</td>
                  @if ( $listNoticia->publicar === 1)
                  <td class="text-center">Si</td>
                  @else
                  <td class="text-center">No</td>
                  @endif
                  <td class="text-center">{{ $listNoticia->fechapublicacion }}</td>
                  <td class="text-center">
                    <div class="row">
                      <div class="col-md-6 text-right">
                        {!! Form::open(['route' => ['noticia.show', $listNoticia->id], 'method'=>'GET']) !!}
                        <a href="#" data-route="{{route('noticia.show', $listNoticia->id)}}" data-toggle="modal" data-target="#myModal"><span class="text-green icon"><i class='fa fa-edit'></i> </span></a>
                        {!! Form::close() !!}
                      </div>
                      <div class="col-md-6 text-left ">
                       {!! Form::open(['url' => ['noticia/fotos', $listNoticia->id], 'method'=>'GET']) !!}
                      <a href="#" data-foto="foto" data-toggle="modal" data-target="#myModalFoto"><span class="text-green icon"><i class='fa fa-photo'></i> Fotos</span></a>
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
    @include('adminlte::modal.modalNoticia')
    @include('adminlte::modal.modalNoticiaFotos')
@endsection
@section('scripts-button')
<script src=" {{ asset('js/scripts/ajaxNoticia.js') }}"></script>
<script src=" {{ asset('js/adminlte/bootstrap-datetimepicker.min.js') }}"></script>
<script src=" {{ asset('js/adminlte/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
    $(function () {
    //$('.textarea').wysihtml5()
    $('textarea[name=textarea]').wysihtml5();
  })
</script>
@endsection
<!-- Left side column. contains the logo and sidebar -->

