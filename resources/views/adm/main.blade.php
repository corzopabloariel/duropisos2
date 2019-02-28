<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('headTitle', 'DuroPisos :: Administración')</title>
        <!-- <Fonts> -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,600i,800,900" rel="stylesheet">
        <!-- </Fonts> -->
        <!-- <Styles> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="{{ asset('css/materialize.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/lobibox.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
        <!-- </Styles> -->
    </head>
    <body>
        <ul id="nav-mobile" class="sidenav s12 m3 xl3 sidenav-fixed" style="padding: 0; height: 100%; overflow-y: hidden; background-color:#ededed;" role="navigation">
            <li><img class="sidenav-img" src="{{ asset('img/logo/logo.png') }}"></li>
            <li class="no-padding scroll" style="height: calc(100% - 140.78px); overflow-x: auto">
                <ul class="collapsible z-depth-0 no-margin">
                    <li class="active">
                        <div class="collapsible-header"><i class="material-icons">home</i>Home</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('slider.create', ['seccion' => 'home']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Crear Slider</a></li>
                                <li><a href="{{ route('slider.edit', ['seccion' => 'home']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar Slider</a></li>
                                <li><a href="{{ route('page', ['seccion' => 'home']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">view_day</i>Empresa</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('slider.create', ['seccion' => 'empresa']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Crear Slider</a></li>
                                <li><a href="{{ route('slider.edit', ['seccion' => 'empresa']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar Slider</a></li>
                                <li><a href="{{ route('page', ['seccion' => 'empresa']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">storage</i>Productos</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('producto', ['tipo' => 'familia']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar familias</a></li>
                                <li><a href="{{ route('producto', ['tipo' => 'uno']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar productos</a></li>
                                <li><a href="{{ route('productos') }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Carga de tablas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">style</i>Aplicación</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('add', ['seccion' => 'aplicacion']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Agregar aplicación</a></li>
                                <li><a href="{{ route('page', ['seccion' => 'aplicacion']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">grid_on</i>Trabajos realizados</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('add', ['seccion' => 'trabajo']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Agregar trabajo</a></li>
                                <li><a href="{{ route('page', ['seccion' => 'trabajo']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">help</i>Preguntas frecuentes</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('add', ['seccion' => 'pregunta']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Agregar pregunta</a></li>
                                <li><a href="{{ route('page', ['seccion' => 'pregunta']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">local_library</i>Distribuidores</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('add', ['seccion' => 'distribuidor']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Agregar distribuidor</a></li>
                                <li><a href="{{ route('page', ['seccion' => 'distribuidor']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">insert_emoticon</i>Ventajas</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="{{ route('add', ['seccion' => 'ventaja']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Agregar ventaja</a></li>
                                <li><a href="{{ route('page', ['seccion' => 'ventaja']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dato">
                        <div class="collapsible-header"><i class="material-icons">work</i>Datos de la empresa</div>
                        <div class="collapsible-body">
                            <ul>{{-- --}}
                                <li><a href="{{ route('empresa') }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar datos</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dato">
                        <div class="collapsible-header"><i class="material-icons">description</i>Metadatos</div>
                        <div class="collapsible-body">
                            <ul>{{-- --}}
                                <li><a href="{{ route('metadatos') }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar metadatos</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dato">
                        <div class="collapsible-header"><i class="material-icons">perm_contact_calendar</i>Usuarios</div>
                        <div class="collapsible-body">
                            <ul>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Crear usuario</a></li>
                                <li><a class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar usuario</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                
            </li>
            {{-- href="" --}}
            <a href="{{route('adm.logout')}}">
                Cerrar Sesión
            </a>
        </ul>
        <div class="row">
            <div class="col s12 m12 l9 xl9 offset-l3 offset-xl3">
                <div class="d-flex align-items-center">
                    <a href="#" data-target="nav-mobile" class="menu ocultar-menu no-margin sidenav-trigger text_principal_444444 bg-F9F9F9"><i class="material-icons">menu</i></a>
                    <span class="text-truncate">{{ $title }}</span>
                </div>
            </div>
        </div>
        <div id="page-wrapper" class="row">
            
            <div class="col s12 m12 l9 xl9 offset-l3 offset-xl3">
                <div class="container">
                </div>
                @yield('body')
            </div>
        </div>
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <form onsubmit="event.preventDefault(); submitEdit(this);" method="post" action="" novalidate>
                <div class="modal-content">
                </div>
                <div class="modal-footer">
                </div>
            </form>
        </div>
        <!-- <Script> -->
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <script src="{{ asset('js/materialize.js') }}"></script>
        <script src="{{ asset('js/lobibox.js') }}"></script>
        <script src="{{ asset('js/var.js') }}"></script>
        <!-- </Script> -->
        <script>
            M.AutoInit();
            //
            edit = function(t,id) {
                let modal = $("#modal1");
                let url = "{{ url('/adm/data/') }}";
                let url_edit = "{{ url('/adm/editdata/') }}";
                url += `/${t}/${id}`;
                // url_edit += `/${t}/${id}`;

                modal.find("form").attr("action",url_edit);
                $.ajax({
                    url: url,
                    method: 'get',
                    dataType: 'json',
                    asy: false,
                    success: function(result){
                        if(result !== null) {
                            let html = footer = "";
                            switch(t) {
                                case 'servicio':
                                    html += '<h4>Editar servicio</h4>';
                                    html += '<div class="container">';
                                        html += `<input type="hidden" val="${result.id}" id="id" name="id" />`;
                                        html += '<div class="row">';
                                            html += '<div class=" col s6">';
                                                html += '<label for="first_name">Nombre</label>';
                                                html += `<input placeholder="Nombre" id="title" name="title" type="text" required="true" class="validate" value="${result.title}">`;
                                            html += '</div>';
                                            html += '<div class=" col s6">';
                                                html += '<label for="first_name">Orden</label>';
                                                html += `<input placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="file-field input-field col s12">';
                                                html += '<div class="btn">';
                                                    html += '<span>Imagen</span>';
                                                    html += '<input type="file">';
                                                html += '</div>';
                                                html += '<div class="file-path-wrapper">';
                                                    html += `<input class="file-path validate" required="true" id="icon" name="icon" type="text" val="${result.icon}">`;
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                        if(result.icon != "") {
                                            html += '<div class="row">';
                                                html += '<div class="col s12">';
                                                    html += `<img src="${result.icon}" alt="Ícono ${result.id}" />`;
                                                html += '</div>';
                                            html += '</div>';
                                        } else {
                                            html += '<div class="row">';
                                                html += '<div class="col s12">';
                                                    html += '<p style="text-align:center">SIN ÍCONO</p>';
                                                html += '</div>';
                                            html += '</div>';
                                        }
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                break;
                            }
                            
                            modal.find(".modal-content").html(html);
                            modal.find(".modal-footer").html(footer);
                            modal.modal("open");
                        }
                    }
                });
                
            }
            
            submitEdit = function(t) {
                let form_data = new FormData(t);
                
                if(validar(t)) {
                    $.ajax({
                        url: t.action,
                        method: 'POST',
                        data:  form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend : function() {
                            notificacion("Subiendo archivo. Al finalizar la tabla se actualizará");
                        },
                        success: function(data){
                            console.log(data);
                            
                        }
                    });
                } else
                    notificacion("Faltan datos necesarios","error");
            }
        </script>
    </body>
</html>