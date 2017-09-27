<div id="header" class="sticky shadow-after-3 clearfix">
    <!-- TOP NAV -->
    <header id="topNav">
        <div class="container">
            <!-- Mobile Menu Button -->
            <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Logo -->
             @foreach($micrositios as $micrositio)
            <span class="logo pull-left">
                
                <img src='{{asset("img/departamentos/$micrositio->logo")}}' alt="" />
              
            </span>
            <div class="navbar-collapse pull-right nav-main-collapse collapse">
                <nav class="nav-main">
                    <ul id="topMain" class="nav nav-pills nav-main">
                        <li class="dropdown">
                            <!-- HOME -->
                            <a class="page-scroll" href="../../{{$micrositio->nombre}}#">
                                 INICIO
                            </a>
                        </li>
                        <li class="dropdown">
                            <!-- PAGES -->
                            <a class="page-scroll" href="../../{{$micrositio->nombre}}#intro">
                                NOSOTROS
                            </a>
                        </li>
                        <li class="dropdown">
                            <!-- FEATURES -->
                            <a class="page-scroll" href="../../{{$micrositio->nombre}}#servicios">
                                SERVICIOS
                            </a>
                        </li>
                        <li class="dropdown">
                            <!-- FEATURES -->
                            <a class="page-scroll" href="../../{{$micrositio->nombre}}#filosofia">
                                FILOSOFÍA
                            </a>
                        </li>
                        <li class="dropdown">
                            <!-- PORTFOLIO -->
                            <a class="page-scroll" href="../../{{$micrositio->nombre}}#noticias">
                                NOTICIAS
                            </a>
                        </li>
                        <li class="dropdown">
                            <!-- BLOG -->
                            <a class="page-scroll" href="../../{{$micrositio->nombre}}#repositorio">
                                REPOSITORIO
                            </a>
                        </li>
                        <li class="dropdown">
                            <!-- SHOP -->
                            <a class="page-scroll" href="../../{{$micrositio->nombre}}#proyectos">
                                PROYECTOS
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            @endforeach
        </div>
    </header>
    <!-- /Top Nav -->
</div>