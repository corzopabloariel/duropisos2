<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('headTitle', 'Duro Pisos . Duro Fix . Revestimientos Cementicios . Argentina')</title>
        <link rel="icon" type="image/png" href="{{ asset('img/logo/'. $favicon) }}"/>
        

        <!-- <Fonts> -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,600i,800,900" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

        <!-- </Fonts> -->
        <!-- <Styles> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="{{ asset('css/materialize.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/messagebox.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/lobibox.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/style.public.css') }}" rel="stylesheet" type="text/css" >
        <!-- </Styles> -->
    </head>
    <body>
        <div id="modal1" class="modal">
            <div class="modal-content">
            </div>
        </div>
        <div id="wrapper">
            @yield('body')
        </div>

        <!-- <Script> -->
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="{{ asset('js/materialize.js') }}"></script>
        <script src="{{ asset('js/messagebox.js') }}"></script>
        <script src="{{ asset('js/lobibox.js') }}"></script>
        <script src="{{ asset('js/var.js') }}"></script>
        <!-- </Script> -->
        <script>
            M.AutoInit();
            $(window).ready(function() {
                $('.carousel.carousel-slider').carousel({
                    fullWidth: true,
                    indicators: true
                });

                $(".colores > div").on("click",function() {
                    let data = $(this).html();
                    let description = $(this).data("descripcion");
                    let modal = $("#modal1");

                    let html = data;

                    modal.find(".modal-content").html(`<div class="container">${html}${description}</div>`);
                    modal.modal("open");
                })

                $(".tipos a").on("click", function(e) {
                    e.preventDefault();
                    let tipo = parseInt($(this).data("tipo"));
                    let target = $(".trabajos");

                    $(this).closest(".tipos").find(".activo").removeClass("activo");
                    $(this).addClass("activo");

                    if(tipo == 0)
                        target.find("> div").removeClass("d-none");
                    else {
                        target.find("> div").addClass("d-none");
                        target.find(`> div[data-tipo='${tipo}']`).removeClass("d-none");
                    }
                });
            });
            var onloadCallback = function() {
                grecaptcha.render('html_element', {
                  'sitekey' : '6LeDa5YUAAAAACnCJJE6NC28LIZ6kqNY7kywhrmB'
                });
            };
        </script>
    </body>
</html>
