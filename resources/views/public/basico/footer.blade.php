<footer class="page-footer footer text_principal_39373E">
    <div class="container">
    <div class="row">
        <div class="col l3 m6 s12">
            <img src="{{ asset('img') }}/{{ $logoFooter }}"/>
        </div>
        <div class="col l4 m6 s12 espacio">
            <p class="text-uppercase">Secciones</p>
            <div class="row m-0">
                <div class="col s6">
                    <ul class="ul-separado">
                        <li><a href="{{ URL::to('/') }}">Inicio</a></li>
                        <li><a href="{{ URL::to($path . '/empresa') }}">Empresa</a></li>
                        <li><a href="{{ URL::to($path . '/aplicacion') }}">Aplicación</a></li>
                        <li><a href="{{ URL::to($path . '/trabajos') }}">Trabajos Realizados</a></li>
                    </ul>
                </div>
                <div class="col s6">
                    <ul class="ul-separado">
                        <li><a href="{{ URL::to($path . '/preguntas') }}">Preguntas frecunetes</a></li>
                        <li><a href="{{ URL::to($path . '/distribuidores') }}">Distribuidores</a></li>
                        <li><a href="{{ URL::to($path . '/ventajas') }}">Ventajas</a></li>
                        <li><a href="{{ URL::to($path . '/contacto') }}">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col l2 m6 s12">
            @if(!empty($contacto["facebook"]) || !empty($contacto["instagram"]))
            <p class="text-uppercase">Seguinos en</p>
            @endif
            @if(!empty($contacto["facebook"]))
            <a href="$contacto['facebook']" target="blank" class="redes"><i class="fab fa-facebook"></i></a>
            @endif
            @if(!empty($contacto["instagram"]))
            <a href="$contacto['instagram']" target="blank" class="redes"><i class="fab fa-instagram"></i></a>
            @endif
        </div>
        <div class="col l3 m6 s12 espacio">
            <p class="text-uppercase">Duro pisos s.r.l.</p>
            <ul class="ul-separado">
                <li><i class="material-icons">location_on</i>{!! $domicilio !!}</li>
                <li><i class="material-icons">phone_in_talk</i><a href="tel:{{$contacto['telefono_1']}}">{{$contacto["telefono_1"]}}</a></li>
                <li><i class="material-icons">email</i><a class="" href="mailto:{{$contacto['email_1']}}">{{$contacto["email_1"]}}</a><br/><a class="" href="mailto:{{$contacto['email_2']}}">{{$contacto["email_2"]}}</a></li>
            </ul>
        </div>
    </div>
    </div>
    <div class="footer-copyright text_principal_39373E">
        <div class="container text-right">
            <a class="" href="http://osole.es" style="color:#6E6E6E;">By OSOLE</a>
        </div>
    </div>
</footer>