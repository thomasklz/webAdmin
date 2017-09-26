<div id="topBar">
    <div class="container">
       <!-- <div>
            <ul class="top-links list-inline pull-right">
                <!--<li class="text-welcome hidden-xs">Administador<strong>Posgrado</strong></li>-->
               <!-- <li class="hidden-xs"><a target="_blank" href="login.aspx"><i class="fa fa-user hidden-xs"></i>ACCESO</a></li>
            </ul>
        </div>-->
        <div class="social-icons pull-left hidden-xs">
        @foreach($redesSociales as $redSocial)
            <a target="_blank" href="{{$redSocial->link}}" class="social-icon social-icon-sm social-icon-transparent social-{{$redSocial->redSocial}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{$redSocial->redSocial}}">
                <i class="icon-{{$redSocial->redSocial}}"></i>
                 <i class="icon-{{$redSocial->redSocial}}"></i>
           </a>
        @endforeach
        </div>
        <!--<ul class="top-links list-inline pull-right">
            <li>
                <a class="dropdown-toggle no-text-underline" data-toggle="dropdown" href="#"><img class="flag-lang" src="{{asset('images/plantilla/images/flags/ec.png')}}" width="16" height="11" alt="lang"> ESPAÑOL</a>
                <ul class="dropdown-langs dropdown-menu">
                    <li><a tabindex="-1" href="#"><img class="flag-lang" src="{{asset('images/plantilla/images/flags/ec.png')}}" width="16" height="11" alt="lang"> ESPAÑOL</a></li>
                    <li class="divider"></li>
                    <li><a tabindex="-1" href="#"><img class="flag-lang" src="{{asset('images/plantilla/images/flags/us.png')}}" width="16" height="11" alt="lang"> ENGLISH</a></li>
                </ul>
            </li>
        </ul>-->
    </div>
</div>