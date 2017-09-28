<section id="proyectos" class="alternate">
    <div class="container">
        <div class="text-center">
            <h1 class="nomargin-bottom">Proyectos</h1>
        </div>
        <div class="divider divider-center divider-color">
            <i class="fa fa-chevron-down"></i>
        </div>
        <div id="portfolio" class="portfolio-gutter portfolio-title-over">
            <ul class="nav nav-pills mix-filter margin-bottom-60">
                <li data-filter="all" class="filter active"><a href="#">Todos</a></li>
                @foreach($categoriasproyecto as $categoriaproyecto)
                <li data-filter="{{$categoriaproyecto->categoria}}" class="filter"><a href="#">{{$categoriaproyecto->categoria}}</a></li>
                @endforeach
            </ul>
            <div class="row mix-grid">
                <!-- item -->
                @foreach($proyectos as $proyecto)
                <div class="col-md-3 col-sm-3 mix {{$proyecto->categoria}}">
                    <!-- item -->
                    <div class="item-box">
                        <figure>
                            <div class="item-hover">
                                <span class="overlay dark-5"></span>
                                <span class="inner">
                                    <!-- lightbox -->
                                    <a class="ico-rounded lightbox" href='{{asset("img/proyectos/$proyecto->foto")}}' data-plugin-options='{"type":"image"}'>
                                        <span class="fa fa-plus size-20"></span>
                                    </a>
                                    <!-- details -->
                                    <a class="ico-rounded" href="{{$proyecto->unidad}}/proyectos/{{$proyecto->id}}">
                                        <span class="glyphicon glyphicon-option-horizontal size-20"></span>
                                    </a>
                                </span>
                                <!-- overlay title -->
                                <div class="item-box-overlay-title">
                                    <h3>{{$proyecto->autor}}</h3>
                                    <ul class="list-inline categories nomargin">
                                        <li><a href="{{$proyecto->unidad}}/proyectos/{{$proyecto->id}}">{{$proyecto->fecha}}</a></li>
                                        <li><a href="{{$proyecto->unidad}}/proyectos/{{$proyecto->id}}">{{$proyecto->estado}}</a></li>
                                    </ul>
                                </div>
                                <!-- /overlay title -->
                            </div>
                            <img class="img-responsive" src='{{asset("img/proyectos/$proyecto->foto")}}' width="600" height="399" alt="">
                        </figure>
                    </div>
                </div>
                @endforeach
                <!-- /item -->
            </div>
        </div>
    </div>
</section>