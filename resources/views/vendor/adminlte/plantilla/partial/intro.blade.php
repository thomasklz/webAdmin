<section id="intro">
    <div class="container">
    @foreach($micrositios as $micrositio)
        <div class="text-center">
            <h1 class="nomargin-bottom">MICROSITIO DE <span>{{$micrositio->nombre}} </span></h1>
            <h2 class="col-sm-10 col-sm-offset-1 nomargin-bottom weight-300 text-muted size-20">{{$micrositio->frase}}</h2>
        </div>
        <div class="divider divider-center divider-color">
            <i class="fa fa-chevron-down"></i>
        </div>
        <div class="row text-left">
            <div class="col-sm-6">
                <div>
                    <a href="#">
                        <img class="img-responsive" src='{{asset("img/departamentos/$micrositio->foto")}}' alt="">
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <h3 class="weight-300" style="text-align:">Información de <span>{{$micrositio->nombre}}</span></h3>
                <p>{{$micrositio->resumen}}</p><a href="#">ver más</a>
                <hr />
            </div>
        </div>
        @endforeach
    </div>
</section>