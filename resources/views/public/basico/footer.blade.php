<footer class="page-footer footer text_principal_39373E">
    <div class="container">
    <div class="row">
        <div class="col l3 s12">
            <img src="{{ asset('img') }}/{{ $logoFooter }}"/>
        </div>
        <div class="col l4 s12">
            <p class="text-uppercase">Secciones</p>
            <div class="row m-0">
                <div class="col s6">
                    <ul class="ul-separado">
                        <li><a href="#!">Inicio</a></li>
                        <li><a href="#!">Empresa</a></li>
                        <li><a href="#!">Aplicación</a></li>
                        <li><a href="#!">Trabajos Realizados</a></li>
                    </ul>
                </div>
                <div class="col s6">
                    <ul class="ul-separado">
                        <li><a href="#!">Preguntas frecunetes</a></li>
                        <li><a href="#!">Distribuidores</a></li>
                        <li><a href="#!">Ventajas</a></li>
                        <li><a href="#!">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col l2 s12">
            <p class="text-uppercase">Seguinos en</p>
        </div>
        <div class="col l3 s12">
            <p class="text-uppercase">Duro pisos s.r.l.</p>
            <ul class="ul-separado">
                <li>{!! $domicilio !!}</li>
                <li>{{$contacto["telefono_1"]}}</li>
                <li>{{$contacto["email_1"]}}<br/>{{$contacto["email_2"]}}</li>
            </ul>
        </div>
    </div>
    </div>
    <div class="footer-copyright text_principal_39373E">
        <div class="container text-right">
            <a class="" href="#!">By OSOLE</a>
        </div>
    </div>
</footer>