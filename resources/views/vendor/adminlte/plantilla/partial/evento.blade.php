<section id="eventos" class="padding-md parallax parallax-2" style="background-image: url('{{asset('assets/images/demo/particles_bg.jpg')}}');">
    <div class="container">
        <div class="text-center">
            <h3 class="nomargin-bottom">Eventos <span>programados </span></h3>
        </div>
        <div class="divider divider-center divider-color">
            <i class="fa fa-chevron-down"></i>
        </div>
        <div class="row">
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-option-vertical"></i> Ordenados por fecha</h4>
            @foreach ($eventos as $evento)
            <?php $a = 1; ?>
            <div class="col-sm-4">
                @if($a<=2)
                <div class="event-item">
                    <div class="event-date-wrapper">
                        <span class="event-date-day">{{date('d', strtotime($evento->fecha))}}</span>
                        <span class="event-date-month">
                        @if(date('m', strtotime($evento->fecha)) == 1)
                         Ener
                        @endif
                        @if(date('m', strtotime($evento->fecha)) == 2)
                         Febr
                        @endif
                         @if(date('m', strtotime($evento->fecha)) == 3)
                         Marz
                        @endif
                         @if(date('m', strtotime($evento->fecha)) == 4)
                         Abri
                        @endif
                         @if(date('m', strtotime($evento->fecha)) == 5)
                         Mayo
                        @endif
                         @if(date('m', strtotime($evento->fecha)) == 6)
                         Junio
                        @endif
                         @if(date('m', strtotime($evento->fecha)) == 7)
                         Juli
                        @endif
                         @if(date('m', strtotime($evento->fecha)) == 8)
                         Agos
                        @endif
                         @if(date('m', strtotime($evento->fecha)) == 9)
                         Sept
                        @endif
                         @if(date('m', strtotime($evento->fecha)) == 10)
                         Octu
                        @endif
                         @if(date('m', strtotime($evento->fecha)) == 11)
                         Novi
                        @endif
                         @if(date('m', strtotime($evento->fecha)) == 12)
                         Dici
                        @endif
                        </span>
                    </div>
                    <div class="event-content-wrapper">
                        <div class="event-content-inner-wrapper">
                            <h3 class="event-title"><a href="" style="color: #2E64FE">{{$evento->titulo}}</a></h3>
                            <div class="event-location">{{$evento->lugar}} </div>
                        </div>
                        <div class="event-status-wrapper">
                            <a href="{{$evento->url}}">Ver</a>
                        </div>
                    </div>
                </div>
                 <?php $a = $a + 1 ; ?>
                @endif
            </div>
            @endforeach 
        </div>
    </div>
</section>