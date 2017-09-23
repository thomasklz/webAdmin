<section id="repositorio" class="dark">
    <div class="container">
        <header class="text-center margin-bottom-20 clearfix">
            <h2 class="weight-300 nomargin-bottom">
                <strong>FORMATOS</strong>
                <span class="word-rotator" data-delay="2000">
                    <span class="items">
                        <span><strong> Y FORMULARIOS</strong></span>
                        <span><strong>- DESCARGAS</strong></span>
                    </span>
                </span>                           
            </h2>
        </header>
        <div class="divider divider-center divider-color">
            <i class="fa fa-chevron-down"></i>
        </div>
        <ul class="list-unstyled">
            @foreach($documentos as $documento)
            <li class="clearfix border-bottom-dotted relative margin-bottom-10">
                <a class="clearfix size-18 block relative padding-10" target="_blank" href='{{asset("documentos/$documento->nombre")}}'>
                    <span class="pull-right text-default size-14">Publicación / {{$documento->fecha}}</span>
                     {{$documento->categoria}} - {{$documento->nombre}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</section>