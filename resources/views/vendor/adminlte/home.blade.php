@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen center" style="padding-top: 50px;padding-bottom: 50px; text-align: center; color: #fff;background-color: #585858">
		<h1>Bienvenidos al panel de administración</h1>
	</div>
@endsection
