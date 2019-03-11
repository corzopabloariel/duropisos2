@extends('public.main')

@section('headTitle', 'Producto :: ' . $title . ' | Duro Pisos')
@section('bodyTitle', 'Producto :: ' . $title)

@section('body')
@include('public.basico.header')
<main>
    <div class="container">
        <div class="image-producto">
            <div class="row">
                <div class="col s12">
                    @if(!empty($producto))
                    <img src="{{ asset('img') }}/{{ $producto['image'] }}" alt="Producto - {{$title}}"/>
                    @endif
                </div>
            </div>
        </div>
        <div class="nav-producto">
            <div class="row">
                <div class="col s12">
                    <a class="a-link" href="{{ URL::to($path . '/productos') }}">« Volver</a>
                </div>
            </div>
            <div class="row">
                <div class="col s12 l6">
                    <h4 class="m-0 text-title">{{$title}}</h4>
                </div>
                <div class="col s12 l6 text-right">
                    <div class="mercadolibre">
                        @if(!empty($producto["url_mercadolibre"]))
                        <a href="{{$producto['url_mercadolibre']}}" target="blank"><img src="{{ asset('img/general') }}/mercadolibre.fw.png" alt="Mercadolibre"/></a>
                        @endif
                        @if(!empty($producto["url_mercadopago"]))
                        <a href="{{$producto['url_mercadopago']}}" target="blank"><img src="{{ asset('img/general') }}/mercadopago.fw.png" alt="Mercadopago"/></a>
                        @endif
                    </div>
                </div>
            </div>
            @if(!empty($producto["descripcion"]))
            <div class="row">
                <div class="col s12 l3">
                    <p class="text-titulo text-uppercase">descripción</p>
                </div>
                <div class="col s12 l9 text_principal_595959">{!! $producto["descripcion"] !!}</div>
            </div>
            @endif
            @if(!empty($producto["ventaja"]))
            <div class="row">
                <div class="col s12 l3">
                    <p class="text-titulo text-uppercase">ventajas</p>
                </div>
                <div class="col s12 l9 text_principal_595959 ventajas">{!! $producto["ventaja"] !!}</div>
            </div>
            @endif
            @if(!empty($producto["presentacion"]))
            <div class="row">
                <div class="col s12 l3">
                    <p class="text-titulo text-uppercase">presentación</p>
                </div>
                <div class="col s12 l9 text_principal_595959 presentacion">{!! $producto["presentacion"] !!}</div>
            </div>
            @endif
            @if(!empty($producto["color"]))
            <div class="row">
                <div class="col s12 l3">
                    <p class="text-titulo text-uppercase">colores</p>
                </div>
                <div class="col s12 l9 text_principal_595959">
                    {!! $producto["color"] !!}
                    <div class="colores">
                        @foreach($producto["colores"] AS $color)
                            <div class="" data-descripcion="{!! $color['descripcion'] !!}">
                                <img src="{{ asset('img') }}/{{ $color['image'] }}" alt="Color - {{$color['name']}}"/>
                                <p>{{$color["code"]}} {!!$color["name"]!!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</main>
@include('public.basico.footer')
@endsection