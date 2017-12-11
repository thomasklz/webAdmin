@extends('adminlte::layouts.errors')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.servererror') }}
@endsection

@section('main-content')
<body style="background-color: #A9F5BC">
    <div class="error-page" style="background-color: #A9F5BC">
        <h1 class="text-red text-left" style="font-family:Cooper Black; font-size: 250px; text-align: center">404</h1>
        <div class="error-content">
            <h3><i class="fa fa-warning text-red" style="padding-bottom: 50px"></i> Oops!  Not Found</h3>
            <p>
           
            </p>
        </div>
    </div><!-- /.error-page -->
</body>
@endsection