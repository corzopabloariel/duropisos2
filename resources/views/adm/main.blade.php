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
        <link href="{{ asset('css/messagebox.css') }}" rel="stylesheet" type="text/css" >
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
                                <li><a href="{{ route('page', ['seccion' => 'producto']) }}" class="collapsible-header"><i class="material-icons">arrow_forward</i> Editar contenido</a></li>
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
        <div class="row position-absolute w-100">
            <div class="col s12 m12 l9 xl9 offset-l3 offset-xl3">
                <div style="padding: 1em 0;" class="d-flex align-items-center">
                    <a href="#" data-target="nav-mobile" class="menu ocultar-menu no-margin sidenav-trigger text_principal_444444 bg-F9F9F9"><i class="material-icons">menu</i></a>
                    <span class="text-truncate">{{ $title }}</span>
                </div>
            </div>
        </div>
        <div id="page-wrapper" class="row no-margin">
            
            <div class="col s12 m12 l9 xl9 offset-l3 offset-xl3">
                <div class="container">
                </div>
                @yield('body')
            </div>
        </div>
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <form id="formModal" onsubmit="event.preventDefault(); submitEdit(this);" method="post" action="" novalidate>
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
        <script src="{{ asset('js/messagebox.js') }}"></script>
        <script src="{{ asset('js/lobibox.js') }}"></script>
        <script src="{{ asset('js/var.js') }}"></script>
        <!-- </Script> -->
        <script>
            url = '{{url()->current()}}';
            $(".active").removeClass("active");
            $(`a[href="${url}"]`).closest("ul").closest("li").addClass("active");
            $(`a[href="${url}"]`).closest("li").addClass("active");
            $(document).ready(function() {

            });
            M.AutoInit();
            //
            addRegistro = function(t) {
                let modal = $("#modal1");
                let html = footer = "";
                let url_add = "{{ url('/adm/adddata/') }}";
                switch(t) {
                    case 'ventaja':
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar ventaja</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                        html += '<div class="container add">';
                            html += '<div class="row">';
                                html += '<div class=" col s6">';
                                    html += '<label for="first_name">Título</label>';
                                    html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate">`;
                                html += '</div>';
                                html += '<div class=" col s6">';
                                    html += '<label for="first_name">Orden</label>';
                                    html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class="file-field input-field col s12">';
                                    html += '<div class="btn">';
                                        html += '<span>Imagen</span>';
                                        html += '<input type="file" id="icon" name="icon">';
                                    html += '</div>';
                                    html += '<div class="file-path-wrapper">';
                                        html += `<input class="file-path" disabled required="true" id="icon" name="icon" type="text">`;
                                        html += '<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado 92x92</span>';
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                    break;
                    case 'pregunta':
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar pregunta</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += '<div class="container add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="pregunta">Pregunta</label>';
                                    html += `<input placeholder="Pregunta" id="pregunta" name="pregunta" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="respuesta">Respuesta</label>';
                                    html += `<textarea placeholder="Respuesta" id="respuesta" name="respuesta" required="true" class="validate materialize-textarea"></textarea>`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s6">';
                                    html += '<label for="order">Orden</label>';
                                    html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                        break;
                    case 'aplicacion':
                        modal.find("form").attr("action",url_add);
                        html += '<h4>Agregar aplicación</h4>';
                        html += `<input name="tipo" type="hidden" value="${t}">`;
                        html += '<div class="container add">';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="title">Título</label>';
                                    html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s12">';
                                    html += '<label for="video">Link de youtube</label>';
                                    html += `<input maxlength="20" placeholder="Youtube" id="video" name="video" type="text" required="true" class="validate"/>`;
                                    html += '<span class="helper-text">www.youtube.com/watch?v=<strong>XXXXXXXXXXX</strong></span>';
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="row">';
                                html += '<div class=" col s6">';
                                    html += '<label for="order">Orden</label>';
                                    html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate">`;
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                        footer += '<button type="submit" class="btn btn-success">Agregar</button>';
                        break;
                }
                modal.find(".modal-content").html(html);
                modal.find(".modal-footer").html(footer);
                modal.modal("open");
            }
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
                                        html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                        html += `<input name="tipo" type="hidden" value="${t}">`;
                                        html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                                        html += '<div class="row">';
                                            html += '<div class=" col s6">';
                                                html += '<label for="first_name">Nombre</label>';
                                                html += `<input placeholder="Nombre" id="title" name="title" type="text" required="true" class="validate" value="${result.title}">`;
                                            html += '</div>';
                                            html += '<div class=" col s6">';
                                                html += '<label for="first_name">Orden</label>';
                                                html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="file-field input-field col s12">';
                                                html += '<div class="btn">';
                                                    html += '<span>Imagen</span>';
                                                    html += '<input type="file" id="icon" name="icon">';
                                                html += '</div>';
                                                html += '<div class="file-path-wrapper">';
                                                    html += `<input class="file-path validate" disabled required="true" val="${result.icon}" id="icon_text" name="icon_text" type="text">`;
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="col s12">';
                                                html += `<img onError="this.src='{{ asset('img/general/no-img.png') }}'" src="${result.icon}" alt="Ícono ${result.id}" />`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                break;
                                case 'ventaja':
                                    html += '<h4>Editar ventaja</h4>';
                                    html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                    html += `<input name="tipo" type="hidden" value="${t}">`;
                                    html += `<input name="url" type="hidden" value="{{ asset('img/') }}">`;
                                    html += '<div class="container">';
                                        html += '<div class="row">';
                                            html += '<div class=" col s6">';
                                                html += '<label for="first_name">Título</label>';
                                                html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate" value="${result.title}">`;
                                            html += '</div>';
                                            html += '<div class=" col s6">';
                                                html += '<label for="first_name">Orden</label>';
                                                html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class="file-field input-field col s12">';
                                                html += '<div class="btn">';
                                                    html += '<span>Imagen</span>';
                                                    html += `<input type="file" id="icon" name="icon">`;
                                                html += '</div>';
                                                html += '<div class="file-path-wrapper">';
                                                    html += `<input class="file-path validate" disabled value="${result.icon}" required="true" type="text" id="icon_text" name="icon_text">`;
                                                    html += '<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado 92x92</span>';
                                                html += '</div>';
                                            html += '</div>';
                                        html += '</div>';
                                        
                                        html += '<div class="row">';
                                            html += '<div class="col s12">';
                                                html += `<img style="width:96px; margin:0 auto;" onError="this.src='{{ asset('img/general/no-img.png') }}'" src="{{ asset('img/') }}/${result.icon}" alt="Ícono ${result.id}" />`;
                                            html += '</div>';
                                        html += '</div>';
                                    html += '</div>';
                                    footer += '<button type="submit" class="btn btn-success">Editar</button>';
                                break;
                                case 'aplicacion':
                                    html += '<h4>Editar aplicación</h4>';
                                    html += `<input type="hidden" value="${result.id}" id="frm_id" name="frm_id" />`;
                                    html += `<input name="tipo" type="hidden" value="${t}">`;
                                    html += '<div class="container">';
                                        html += '<div class="row">';
                                            html += '<div class="col s12">';
                                                html += '<label for="title">Título</label>';
                                                html += `<input placeholder="Título" id="title" name="title" type="text" required="true" class="validate" value="${result.title}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s12">';
                                                html += '<label for="video">Link de youtube</label>';
                                                html += `<input maxlength="20" placeholder="Youtube" id="video" name="video" type="text" required="true" class="validate" value="${result.video}"/>`;
                                                html += '<span class="helper-text">www.youtube.com/watch?v=<strong>XXXXXXXXXXX</strong></span>';
                                            html += '</div>';
                                        html += '</div>';
                                        html += '<div class="row">';
                                            html += '<div class=" col s6">';
                                                html += '<label for="first_name">Orden</label>';
                                                html += `<input maxlength="3" placeholder="Orden" id="order" name="order" type="text" required="true" class="validate" value="${result.order}">`;
                                            html += '</div>';
                                        html += '</div>';
                                        
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
                let url = t.action;
                let token = '{{ csrf_token() }}';
                let myForm = document.getElementById(t.id);
                let formData = new FormData(myForm);
                
                if(myForm.frm_id !== undefined)
                    formData.append("id", myForm.frm_id.value);

                formData.append("_token", token);
                
                if(validar(t)) {
                    if($(t).find(".add").length) {
                        let tipo = $("#tipo").val();
                        
                        $.ajax({
                            url: t.action,
                            method: 'POST',
                            data:  formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend : function() {
                                notificacion("Espere. Al finalizar la tabla se actualizará");
                            },
                            success: function(data){
                                if($("table").find(".vacio").length)
                                    $("table").find(".vacio").remove();
                                $("table").find("tbody").append(data);
                                $("#modal1").modal("close");
                            }
                        });
                    } else {
                        $.ajax({
                            url: t.action,
                            method: 'POST',
                            data:  formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend : function() {
                                notificacion("Espere. Al finalizar la tabla se actualizará");
                            },
                            success: function(data){
                                $("#modal1").modal("close");
                                if(data.id !== undefined) {
                                    if($(`tr[data-id="${data.id}"]`).length)
                                        $(`tr[data-id="${data.id}"]`).html(data.html)
                                }
                            }
                        });
                    }
                } else
                    notificacion("Faltan datos necesarios","error");
            }
            erase = function(t,id) {
                messagebox(`¿Está seguro de eliminar el registro de <strong>${t.toUpperCase()}</strong>?`,
                function() {
                    $(`tr[data-id="${id}"]`).remove();
                    let url = "{{ url('/adm/erase/') }}";
                    url += `/${t}/${id}`;
                    if($("table tbody").html().trim() == "") {
                        switch(t) {
                            case "pregunta":
                            case "ventaja":
                            case "aplicacion":
                                $("table tbody").html('<tr class="vacio"><td colspan="4">SIN DATOS</td></tr>');
                                break;
                        }
                    }
                    $.ajax({
                        url: url,
                        method: 'get',
                    });
                });
            }
        </script>
    </body>
</html>