<section id="filosofia" class="nomargin-top alternate">
    <div class="container">
        <header class="text-center margin-bottom-20 clearfix">
            <h1 class="weight-300 nomargin-bottom">
                <strong>Filosofía</strong>
                <span class="word-rotator" data-delay="2000">
                    <span class="items">
                        <span><strong> Misión</strong></span>
                        <span><strong> Visión</strong></span>
                        <span><strong> Objetivo</strong></span>
                    </span>
                </span>                           
            </h1>
        </header>
        <!-- H2 -->
        <div class="divider divider-center divider-color">
            <i class="fa fa-chevron-down"></i>
        </div>
        <div class="row text-center">
          @foreach($filosofias as $filosofia)
            <div class="col-lg-4 col-md-4 col-sm-4">
                <figure class="margin-bottom-20">
                    <img class="img-responsive" src='{{asset("img/filosofia/$filosofia->foto")}}' alt="service" />
                </figure>
                <h4 class="nomargin-bottom">{{$filosofia->titulo}}</h4>
                <hr>
                <p class="text-muted size-14">{{$filosofia->contenido}}</p>
            </div>
        @endforeach
        </div>
    </div>
</section>