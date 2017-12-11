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
                    <h1>NOTICIAS</i> </h1>
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
                                <input type="search" placeholder="Buscar noticia..." id="s" name="s" class="serch-input">
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
                            @foreach($noticiasCategoria as $noticiaCategoria)
                            <ul class="list-group list-group-bordered list-group-noicon uppercase">
                                <li class="list-group-item"><a href="../noticia-categoria/{{$noticiaCategoria->categoria}}"><span class="size-11 text-muted pull-right">({{$noticiaCategoria->count}})</span> {{$noticiaCategoria->categoria}}</a></li>
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
                                    @foreach($noticias as $noticia)
                                    <div class="row tab-post">
                                        <!-- post -->
                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                            <a href="{{$noticia->slug}}">
                                                    <img src='{{asset("img/noticia/$noticia->foto")}}' width="50" alt="" />
                                                </a>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <a href="{{$noticia->slug}}" class="tab-post-link">{!! str_limit("$noticia->titulo",35) !!}</a>
                                            <small>{{$noticia->fechaPublicacion}}</small>
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
                        @php($a=0) @foreach($noticiasActual as $noticiaActual) @if($a==0)
                        <h1 class="blog-post-title">{{$noticiaActual->titulo}}</h1>
                        <ul class="blog-post-info list-inline">
                            <li>
                               <i class="fa fa-clock-o"></i> 
                                <span class="font-lato">Publicación: {{$noticiaActual->fechaPublicacion}}</span>
                            </li>
                            <li>
                               <i class="fa fa-user"></i> 
                               <span class="font-lato">Administrador</span>
                            </li>
                        </ul>
                        <div class="nivoSlider" data-controlNav="true" data-pauseOnHover="false" style="width: 830px; height: 350px">
                            @foreach($noticiasActual as $noticiaActuals)
                            <img src='{{asset("img/noticia/$noticiaActuals->foto")}}' alt="" /> @endforeach
                        </div>
                        <!-- /OWL SLIDER -->
                        <!-- article content -->
                        <p class="dropcap" style="text-align : justify;">{!! $noticiaActual->contenido !!}</p>
                        @php($a=1) @endif
                        <!-- /article content -->
                        @endforeach
                        <div class="divider divider-dotted">
                            <!-- divider -->
                        </div>
                        <div class="divider">
                            <!-- divider -->
                        </div>
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