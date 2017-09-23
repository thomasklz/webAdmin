<section class=" alternate" style="background-color: #EAECEE;" id="equipo">
    <div class="container">
        <div class="text-center">
            <h1 class="nomargin-bottom">Equipo de <span>trabajo </span></h1>
        </div>
        <div class="divider divider-center divider-color">
            <i class="fa fa-chevron-down"></i>
        </div>
        <div class="row" style="text-align:center;">
            <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'>
                @foreach($personas as $equipo)
                <div class="col-sm-6 col-md-12">
                    <div class="thumbnail">
                        <img class="img-responsive" src='{{asset("img/persona/$equipo->foto")}}' alt="" />
                        <div class="caption">
                            <h4 class="nomargin">{{$equipo->nombre}} {{$equipo->apellido}}</h4>
                            <small class="margin-bottom-20 block">{{$equipo->cargo}}</small>
                            <a href="#" class="social-icon social-icon-sm social-facebook">
                                <i class="fa fa-facebook"></i>
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#" class="social-icon social-icon-sm social-twitter">
                                <i class="fa fa-twitter"></i>
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon social-icon-sm social-linkedin">
                                <i class="fa fa-linkedin"></i>
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <small class="theme-color"> {{$equipo->correo}}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>