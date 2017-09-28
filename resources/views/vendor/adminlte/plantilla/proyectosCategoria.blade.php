<!DOCTYPE html>
<html>

<head>
    @section('headerplantilla') @include('adminlte::plantilla.partial.headertemplate') @show
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
        <section class="page-header">
            <div class="container">
                <div>
                    <h1>PROYECTOS</i> </h1>
                </div>
            </div>
        </section>
        <!-- -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- LEFT -->
                    <div class="col-md-3 col-sm-3">
                        <!-- INLINE SEARCH -->
                        <div class="inline-search clearfix margin-bottom-30">
                            <form action="#" method="get" class="widget_search">
                                <input type="search" placeholder="Buscar proyecto..." id="s" name="s" class="serch-input">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- /INLINE SEARCH -->
                        <hr />
                        <!-- side navigation -->
                        <div class="side-nav">
                            <div class="side-nav-head">
                                <button class="fa fa-bars"></button>
                                <h4>CATEGORÍAS</h4>
                            </div>
                            @foreach($categoriasProyecto as $categoriaProyecto)
                            <ul class="list-group list-group-bordered list-group-noicon uppercase">
                                <li class="list-group-item"><a href="../proyectos-categoria/{{$categoriaProyecto->categoria}}"><span class="size-11 text-muted pull-right">({{$categoriaProyecto->count}})</span> {{$categoriaProyecto->categoria}}</a></li>
                            </ul>
                            @endforeach
                            <!-- /side navigation -->
                        </div>
                        <!-- JUSTIFIED TAB -->
                        <div class="tabs nomargin-top hidden-xs margin-bottom-40">
                            <!-- tabs -->
                            <ul class="nav nav-tabs nav-bottom-border nav-justified">
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab">
                                        Recientes
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tab">   
                                    </a>
                                </li>
                            </ul>
                            <!-- tabs content -->
                            <div class="tab-content">
                                <!-- POPULAR -->
                                <div id="tab_1" class="tab-pane active">
                                    @foreach($proyectos as $proyecto)
                                    <div class="row tab-post">
                                        <!-- post -->
                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                            <a href="{{$proyecto->id}}">
                                                    <img src='{{asset("img/proyectos/$proyecto->foto")}}' width="50" alt="" />
                                                </a>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <a href="{{$proyecto->id}}" class="tab-post-link">{!! str_limit("$proyecto->titulo",35) !!}</a>
                                            <small>Autor: {{$proyecto->autor}}</small>
                                            <small>{{$proyecto->fecha}}</small>
                                        </div>
                                    </div>
                                    <!-- /post -->
                                    @endforeach
                                </div>
                                <!-- /POPULAR -->
                            </div>
                        </div>
                        <!-- JUSTIFIED TAB -->
                        <!-- SOCIAL ICONS -->
                        <div class="hidden-xs">
                            @foreach($redesSociales as $redSocial)
                            <a href="{{$redSocial->link}}" class="social-icon social-icon-border social-{{$redSocial->redSocial}} pull-left" data-toggle="tooltip" data-placement="top" title="{{$redSocial->redSocial}}">
                                <i class="icon-{{$redSocial->redSocial}}"></i>
                                <i class="icon-{{$redSocial->redSocial}}"></i>
                            </a> @endforeach
                        </div>
                    </div>
                    <!-- RIGHT -->
                    <div class="col-md-9 col-sm-9">
                        @foreach($proyectosSelect as $proyectoSelect)
                       <div class="col-md-4">

                            <div class="box-video text-center">

                                <div class="embed-responsive embed-responsive-16by9">
                                    <a href="../proyectos/{{$proyectoSelect->id}}">
                                        <img src='{{asset("img/proyectos/$proyectoSelect->foto")}}' width="100%"/>
                                    </a>
                                </div>

                                <a class="box-video-title" href="../proyectos/{{$proyectoSelect->id}}">
                                    <small>AUTOR</small>
                                    <h4> {{$proyectoSelect->autor}}</h4>
                                </a>
                                <p class="font-lato weight-300">{{ $proyectoSelect->titulo }}</p>
                                <a class="btn btn-default" href="../proyectos/{{$proyectoSelect->id}}">Leer más</a>
                            </div>

                        </div>
                        @endforeach
                    </div> 
                </div>
            </div>
        </section>
        <!-- / -->
        <!-- /PAGE HEADER -->
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
    @section('scripts') @include('adminlte::plantilla.partial.scriptstemplate') @show
</body>

</html>