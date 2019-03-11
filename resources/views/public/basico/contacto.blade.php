
@extends('public.main')

@section('headTitle', 'Contacto | Duro Pisos')
@section('bodyTitle', 'Contacto')

@section('body')
@include('public.basico.header')

<main>
    <iframe src="https://maps.google.com/?q={{$url_map}}" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

    <div class="container">
        <div class="row">
            <div class="col l4 s12">
                <ul class="ul-separado">
                    <li><i class="material-icons" style="color:#002C5E">location_on</i>{!! $domicilio !!}</li>
                    <li><i class="material-icons" style="color:#002C5E">phone_in_talk</i>{{$contacto["telefono_1"]}}</li>
                    <li><i class="material-icons" style="color:#002C5E">email</i>{{$contacto["email_1"]}}<br/>{{$contacto["email_2"]}}</li>
                </ul>
            </div>
            <div class="col l8 s12">
                <form method="POST" action="{{route('mail')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <input id="" type="text" class="validate" name="nombre" required="true" placeholder="Nombre" tabindex="1">
                        </div>
                        <div class="col l6 m6 s12">
                            <input id="" type="email" class="validate" name="email" required="true" placeholder="Email" tabindex="3">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <input id="" type="text" class="validate" name="apellido" required="true" placeholder="Apellido" tabindex="2">
                        </div>
                        <div class="col l6 m6 s12">
                            <input id="" type="text" class="validate" name="telefono" required="true" placeholder="Teléfono" tabindex="4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <textarea placeholder="Mensaje" id="mensaje" name="mensaje" required="true" class="validate materialize-textarea"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="g-recaptcha" data-sitekey="6LeDa5YUAAAAACnCJJE6NC28LIZ6kqNY7kywhrmB"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p class="m-0">
                                <label>
                                    <input type="checkbox" name="is_ok">
                                    <span>Acepto los términos y condiciones de privacidad</span>
                                </label>
                            </p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col l6 s12">
                            <button class="btn-solo">enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@include('public.basico.footer')
@endsection