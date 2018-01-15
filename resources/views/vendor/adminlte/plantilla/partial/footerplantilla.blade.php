<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img class="footer-logo footer-2" src="{{asset('assets/images/logo-footer.png')}}" alt="">
                <h5>  ESCUELA   SUPERIOR   POLITÉCNICA   AGROPECUARIA   DE   MANABÍ<br> MANUEL FÉLIX LÓPEZ </h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <ul class="list-unstyled">
                                <li class="footer-sprite address">
                                    Matriz - Calceta:
                                    <br> Av. 10 de agosto Nº82 y Granda Centeno
                                    <br>
                                </li>
                                <li class="footer-sprite address">
                                    Campus - Calceta:
                                    <br> El Limón - Edificio de Posgrado
                                    <br>
                                </li>
                            </ul>
                        </address>
                    </div>
                    <div class="col-md-6">
                        <address>
                            <ul class="list-unstyled">
                                <li class="footer-sprite phone">
                                    Teléfono: +593 (05) 3024096
                                </li>
                                <li class="footer-sprite email">
                                    <a href="mailto:posgrado@espam.edu.ec">academicopostgrado@espam.edu.ec</a>
                                </li>
                                <li class="footer-sprite email">
                                    <a href="posgrado@espam.edu.ec">posgrado@espam.edu.ec</a>
                                </li>
                            </ul>
                        </address>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="letter-spacing-1">REDES SOCIALES</h4>
                <!-- Social Icons -->
                <div class="margin-top-20">
                    @foreach($redesSociales as $redSocial)
                    <a href="{{$redSocial->link}}" class="social-icon social-icon-border social-{{$redSocial->redSocial}} pull-left" data-toggle="tooltip" data-placement="top" title="{{$redSocial->redSocial}}">
                        <i class="icon-{{$redSocial->redSocial}}"></i>
                        <i class="icon-{{$redSocial->redSocial}}"></i>
                    </a>
                    @endforeach
                </div>
                <!-- /Social Icons -->
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <ul class="pull-right nomargin list-inline mobile-block">
                <li><a href="#"><strong style="color: #8ab933">© UPS</strong></a></li>
                <li>&bull;</li>
                <li><a href="#">Derechos reservados.</a></li>
            </ul>
            &copy; ESPAM MFL - 2018&nbsp;
        </div>
    </div>
</footer>