<section id="noticias">
    <div class="container">
        <!-- H2 -->
        <div class="text-center">
            <h1 class="nomargin-bottom">Ultimas <span>Noticias </span></h1>
        </div>
        <div class="divider divider-center divider-color">
            <i class="fa fa-chevron-down"></i>
        </div>
        <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'>
            <!-- article item -->
            @foreach($noticias as $noticia)
            <div class="item-box">
                <figure>
                    <a class="item-hover" href="{{$noticia->unidad}}/noticia/{{$noticia->slug}}">
                        <span class="overlay color2"></span>
                        <span class="inner">
                            <span class="block fa fa-plus fsize20"></span>
                            <strong>LEER</strong> ARTICULO
                        </span>
                    </a>
                    <img alt="" class="img-responsive" src='{{asset("img/noticia/$noticia->foto")}}' width="263" height="147" />
                </figure>
                <div class="item-box-desc">
                    <h4>{{$noticia->titulo}}</h4>
                    <small>{{$noticia->fechaPublicacion}}</small>
                    <p>{{$noticia->resumen}}</p>
                </div>
            </div>
            @endforeach
            <!-- /article item -->
        </div>
    </div>
</section>