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
        <!-- BULLET NAVIGATION -->
        @include('adminlte::plantilla.partial.bulletnavegation')
        <!-- /BULLET NAVIGATION -->
        <!-- SLIDE TOP -->
        @include('adminlte::plantilla.partial.slidertop')
        <!-- /SLIDE TOP -->
        <!-- TOP BAR -->
        @include('adminlte::plantilla.partial.slidertop')
        <!-- /TOP BAR -->
        <!-- HEADER MENU -->
        @include('adminlte::plantilla.partial.headermenu')
        <!-- /HEADER MENU -->
        <!-- SLYDER -->
        @include('adminlte::plantilla.partial.slider')
        <!-- /SLYDER -->
        <!-- INTRO-->
        @include('adminlte::plantilla.partial.intro')
        <!-- /INTRO -->
        <!-- FILOSOFIA-->
        @include('adminlte::plantilla.partial.filosofia')
        <!-- /FILOSOFIA -->
        <!-- SERVICIO-->
        @include('adminlte::plantilla.partial.servicio')
        <!-- /SERVICIO -->
        <!-- EVENTO-->
        @include('adminlte::plantilla.partial.evento')
        <!-- /EVENTO-->
        <!-- NOTICIAS-->
        @include('adminlte::plantilla.partial.noticia')
        <!-- /NOTICIAS -->
        <!-- EQUIPO-->
        @include('adminlte::plantilla.partial.equipo')
        <!-- /EQUIPO -->
        <!-- PROYECTOS-->
        @include('adminlte::plantilla.partial.proyecto')
        <!-- /PROYECTOS -->
        <!-- ARCHIVOS-->
        @include('adminlte::plantilla.partial.archivo')
        <!-- /ARCHIVOS-->
        <!-- UBICACION -->
        @include('adminlte::plantilla.partial.ubicacion')
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