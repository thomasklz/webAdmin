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
        @include('adminlte::plantilla.partial.headermenu')
        <!-- /HEADER MENU -->
        @foreach($micrositios as $micrositio)
        <section class="page-header">
            <div class="container">
                <div >
                    <h1>NOSOTROS</h1>
                    <h4 class="nomargin-bottom weight-300 text-muted size-20">{{$micrositio->frase}}</h4>
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
                    <div class="text-left" style="margin: 10px 10px 10px 0px;float: left; width: 50%" >
                        <div>
                            <a href="#">
                                <img class="img-responsive" src='{{asset("img/departamentos/$micrositio->foto")}}' alt="">
                            </a>
                        </div>
                    </div>
                    <div class="text-left">
                        <h3 class="weight-300" style="text-align:">Información de <span>{{$micrositio->nombre}}</span></h3>
                        <p style="text-align : justify;">{!! $micrositio->contenido !!}</p>
                        <hr />
                    </div>
                </div>
            </div>
        @endforeach
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