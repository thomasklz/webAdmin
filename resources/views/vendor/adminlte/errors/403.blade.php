@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.pagenotfound') }}
@endsection

@section('main-content')

    <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>
        <div class="error-content">
            <h2><i class="fa fa-warning text-yellow"></i> Oops! Acceso denegado</h3>
            <p>
               No tienes privilegios para acceder a la ruta indicada
            </p>
        </div><!-- /.error-content -->
    </div><!-- /.error-page -->
@endsection