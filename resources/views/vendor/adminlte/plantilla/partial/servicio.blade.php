<section id="servicios">
    <div class="container">
        <div class="text-center">
            <h1 class="nomargin-bottom">Servicios <span>(Oferta Académica) </span></h1>
        </div>
        <div class="divider divider-center divider-color">
            <i class="fa fa-chevron-down"></i>
        </div>
        <div class="row">
         @foreach($servicios as $servicio)
            <div class="col-md-3">
                <div class="box-icon box-icon-center box-icon-round box-icon-transparent box-icon-large">
                    <a class="box-icon-title" href="">
                        <i class="{{$servicio->foto}}"></i>
                        <h2>{{$servicio->titulo}}</h2>
                    </a>
                    <p>{{$servicio->contenido}}</p>
                    <a class="box-icon-more font-lato weight-300" href="{{$servicio->enlace}}">Leer más</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>