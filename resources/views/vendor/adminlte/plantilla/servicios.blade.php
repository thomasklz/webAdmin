<!DOCTYPE html>
<html>
<head>
@section('headerplantilla')
    @include('adminlte::plantilla.partial.headertemplate')
@show
</head>
<body class="smoothscroll enable-animation">
    <!-- wrapper -->
    <div id="wrapper">
        <!-- SLIDE TOP -->
        @include('adminlte::plantilla.partial.slidertop')
        <!-- /SLIDE TOP -->
        <!-- TOP BAR -->
        @include('adminlte::plantilla.partial.topbar')
        <!-- /TOP BAR -->
        <!-- HEADER MENU -->
        @include('adminlte::plantilla.partial.headermenu2')
        <!-- /HEADER MENU -->
        @foreach($servicios as $servicio)
        <section class="page-header">
            <div class="container">
                <div >
                    <h1>SERVICIOS  <i class="{{$servicio->foto}}"></i> </h1>
                </div>
            </div>
        </section>
        <!-- /PAGE HEADER -->
        <!-- -->
            <div class="container" style="padding-bottom: 80px;"> 
                <div class="divider divider-center divider-color">
                    <i class="fa fa-chevron-down"></i>
                </div>
                <div class="row text-left" >
                    <div class="text-left">
                        <h3 class="weight-300" style="text-align:"><b>{{$servicio->titulo}}</b></h3>
                       <p style="text-align : justify;">{!! $servicio->contenido !!}</p>
                        <hr />
                    </div>
                </div>
            </div>
        @endforeach
        <!-- -->
            <section class="alternate">
                <div class="container">
                    <div class="row">
                        @foreach($serviciosList as $servicioList)
                        <div class="col-md-4">
                            <div class="heading-title heading-border-bottom heading-color">
                                <h3>{{$servicioList->titulo}}</h3>
                            </div>
                            <p>{!! str_limit("$servicioList->contenido",150) !!}</p>
                            <a href="{{$servicioList->id}}"> Leer <span>más</span> </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- / -->
        <!-- FOOTER -->
        @include('adminlte::plantilla.partial.footerplantilla')
        <!-- /FOOTER -->
    </div>
    <!-- /wrapper -->
    <!-- SCROLL TO TOP -->
    <a href="#" id="toTop"></a>
    <!-- PRELOADER -->
    <div id="preloader">
        <div class="inner">
            <span class="loader"></span>
        </div>
    </div>
    <!-- /PRELOADER -->
    <!-- JAVASCRIPT FILES -->
    @section('scripts')
       @include('adminlte::plantilla.partial.scriptstemplate')
    @show 
</body>
</html>