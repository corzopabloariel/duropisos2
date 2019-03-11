@extends('public.main')

@section('headTitle', 'Home | Duro Pisos')
@section('bodyTitle', 'Home')

@section('body')
@include('public.basico.header')

<main>
    <!-- SLIDER -->
    
    <div class="carousel carousel-slider center">
        @foreach($sliders AS $slider)
        <div class="carousel-item" style="background-image: url({{asset('img')}}/{{$slider['image']}}); background-position: top center; background-repeat: no-repeat; background-size: cover;" href="#{{$slider['id']}}!">
        {!! $slider["texto"] !!}
        </div>
        @endforeach
    </div>
    <!-- FAMILIA DE PRODUCTOS -->

    <article class="wrapper-familias">
        <div class="row familias">
            @foreach($familias AS $familia)
            <div class="align-items-center">
                <img src="{{asset('img')}}/{{$familia['image']}}" />
                <p>{!! $familia["title"] !!}</p>
            </div>
            @endforeach
        </div>
    </article>
    <article class="wrapper-empresa-home bg-F9F9F9">
        <div class="container">
            <div class="row m-0">
                <div class="col l6 s12">
                    <img src="{{asset('img')}}/{{$data['image_resume']}}" />
                </div>
                <div class="col l6 s12">
                    <p class="m-0 text-uppercase">{{$data["title_resume"]}}</p>
                    <h4 class="text_importante" style="margin-top:0">{{$data["subtitle_resume"]}}</h4>
                    {!!$data['text_resume']!!}
                    <a href="{{ URL::to($path . '/empresa') }}" class="btn-solo">nuestra empresa</a>
                </div>
            </div>
        </div>
    </article>

    <article class="wrapper-servicio">
        <span></span>
        <div class="container">
            <div class="row m-0">
                <p class="text-uppercase m-0 text-center">servicio integral</p>
                <h4 style="margin-top:0" class="text-center">Garantía y respaldo</h4>
                <div class="row servicios">
                    @foreach($servicios AS $servicio)
                    <div class="col s12 l4">
                        <img src="{{asset('img')}}/{{$servicio['icon']}}" />
                        <p>{!!$servicio["title"]!!}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </article>
</main>

@include('public.basico.footer')
@endsection
<!-- Servicio -->