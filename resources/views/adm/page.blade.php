@extends('adm.main')

@section('headTitle', 'Página | Duro pisos')
@section('bodyTitle', 'Página')

@section('body')
<main>
    @switch($seccion)
        @case('home')
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Empresa</span>
                    <form id="formEmpresa" action="{{ url('/adm/empresa/') }}" method="POST" onsubmit="event.preventDefault(); empresa(this);" novalidate>
                        @csrf
                        @method('POST')
                        <input type="hidden" id="frm_tipo" name="frm_tipo" value="{{ $seccion }}"/>

                        @if(empty($empresa))
                            <h4>Título</h4>
                            <input placeholder="Título" id="title" name="title" type="text" required="true" class="validate">
                            <h4>Subtítulo</h4>
                            <input placeholder="Subtítulo" id="subtitle" name="subtitle" type="text" required="true" class="validate">
                            <h4>Descripción</h4>
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required></textarea>
                            
                            <h4>Imagen</h4>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Imagen</span>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path" required="true" id="image_text" name="image_text" type="text">
                                        <span class="helper-text">Tamaño recomendado 400x400</span>
                                    </div>
                                </div>
                            </div>
                            <p><img class="materialboxed img" src="" onError="this.src='{{ asset('img/general/no-img.png') }}'" /></p>

                            <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Agregar <i class="material-icons right">send</i></button>
                        @else
                            <h4>Título</h4>
                            <input placeholder="Título" value="{{$empresa['title_resume']}}" id="title" name="title" type="text" required="true" class="validate">
                            <h4>Subtítulo</h4>
                            <input placeholder="Subtítulo" value="{{$empresa['subtitle_resume']}}" id="subtitle" name="subtitle" type="text" required="true" class="validate">
                            <h4>Descripción</h4>
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required>{{$empresa["text_resume"]}}</textarea>
                            
                            <h4>Imagen</h4>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Imagen</span>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path" required="true" value="{{$empresa['image_resume']}}" id="image_text" name="image_text" type="text">
                                        <span class="helper-text">Tamaño recomendado 400x400</span>
                                    </div>
                                </div>
                            </div>
                            <p><img class="materialboxed img" src="{{ asset('img') }}/{{$empresa['image_resume']}}" onError="this.src='{{ asset('img/general/no-img.png') }}'" /></p>
                            @if(empty($empresa["title"]))
                                <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Agregar <i class="material-icons right">create</i></button>
                            @else
                                <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Cambiar <i class="material-icons right">create</i></button>
                            @endif
                        @endif
                    </form>
                </div>
            </div>
            <hr/>
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Servicio integral<button onclick="addRegistro('servicio')" class="btn right"><i class="fas fa-plus"></i></button></span>
                    <table class="striped">
                        <thead>
                            <th>Ícono</th>
                            <th>Nombre</th>
                            <th class="text-center">Orden</th>
                            <th class="text-center">Acciones</th>
                        </thead>
                        <tbody>
                            @foreach($servicios as $servicio)
                                <tr>
                                    <td></td>
                                    <td>{{$servicio["title"]}}</td>
                                    <td class="text-center">{{$servicio["order"]}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" onclick="edit('servicio',{{$servicio['id']}})"><i class="material-icons">create</i></button>
                                        <button type="button" class="btn btn-danger"><i class="material-icons">delete</i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @break
        @case('empresa')
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Empresa</span>

                    <form id="formEmpresa" action="{{ url('/adm/empresa/') }}" method="POST" onsubmit="event.preventDefault(); empresa(this);" novalidate>
                        @csrf
                        @method('POST')
                        <input type="hidden" id="frm_tipo" name="frm_tipo" value="{{ $seccion }}"/>

                        @if(empty($empresa))
                            <h4>Título</h4>
                            <input placeholder="Título" id="title" name="title" type="text" required="true" class="validate">
                            <h4>Subtítulo</h4>
                            <input placeholder="Subtítulo" id="subtitle" name="subtitle" type="text" required="true" class="validate">
                            <h4>Descripción</h4>
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required></textarea>
                            
                            <h4>Imagen</h4>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Imagen</span>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path" required="true" id="image_text" name="image_text" type="text">
                                        <span class="helper-text">Tamaño recomendado 400x400</span>
                                    </div>
                                </div>
                            </div>
                            <p><img class="materialboxed img" src="" onError="this.src='{{ asset('img/general/no-img.png') }}'" /></p>

                            <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Agregar <i class="material-icons right">send</i></button>
                        @else
                            <h4>Título</h4>
                            <input placeholder="Título" value="{{$empresa['title']}}" id="title" name="title" type="text" required="true" class="validate">
                            <h4>Subtítulo</h4>
                            <input placeholder="Subtítulo" value="{{$empresa['subtitle']}}" id="subtitle" name="subtitle" type="text" required="true" class="validate">
                            <h4>Descripción</h4>
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required>{{$empresa["text"]}}</textarea>
                            
                            <h4>Imagen</h4>
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn">
                                        <span>Imagen</span>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path" required="true" value="{{$empresa['image']}}" id="image_text" name="image_text" type="text">
                                        <span class="helper-text">Tamaño recomendado 400x400</span>
                                    </div>
                                </div>
                            </div>
                            <p><img class="materialboxed img" src="{{ asset('img') }}/{{$empresa['image']}}" onError="this.src='{{ asset('img/general/no-img.png') }}'" /></p>
                            @if(empty($empresa["title"]))
                                <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Agregar <i class="material-icons right">create</i></button>
                            @else
                                <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Cambiar <i class="material-icons right">create</i></button>
                            @endif
                        @endif
                    </form>
                </div>
            </div>
        </div>
        @break;
        @case("producto")
        @case("aplicacion")
        @case("trabajo")
        @case("pregunta")
        @case("ventaja")
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Título</span>
                    <form id="formTitulo" action="{{ url('/adm/titulo/') }}" method="POST" onsubmit="event.preventDefault(); titulo(this);" novalidate>
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="frm_tipo" value="{{ $seccion }}"/>
                        @if(empty($data))
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required></textarea>
                            <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Agregar <i class="material-icons right">send</i></button>
                        @else
                            <textarea tabindex="1" id="frm_texto" name="frm_texto" required>{{$data["title"]}}</textarea>
                            <button style="margin-top: 1em;" type="submit" class="btn btn-primary">Cambiar <i class="material-icons right">create</i></button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        @break;
        @case("trabajo")
        <div class="card">
            <div class="card-content">
                <span class="card-title">Trabajos realizados<button class="btn right"><i class="material-icons">create</i></button></span>
                <table class="striped">
                </table>
            </div>
        </div>
        @break;
    @endswitch
</main>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('frm_texto');

    CKEDITOR.config.width = '100%';
    empresa = function(t) {
        if(validar(t)) {
            let value = CKEDITOR.instances['frm_texto'].getData();
            let myForm = document.getElementById(t.id);
            let formData = new FormData(myForm);
            if(value == "") {
                notificacion("Faltan datos","error");
                return false;
            }
            formData.set("frm_texto",value);
            $.ajax({
                url: t.action,
                method: 'POST',
                data:  formData,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    notificacion("Espere ...");
                },
                success: function(result){
                    notificacion("La vista se recargara.")
                    location.reload();
                    // if(!result.estado) {
                    //     $("#formTitulo").find("button").html('Cambiar <i class="material-icons right">create</i>');
                    // }
                    // notificacion(result.txt,result.color);
                }
            });
        }
    }
    titulo = function(t) {
        if(validar(t)) {
            let value = CKEDITOR.instances['frm_texto'].getData();
            if(value == "") {
                notificacion("Faltan datos","error");
                return false;
            }

            value = value.trim();
            let tipo = $("#frm_tipo").val();
            let url = $("#formTitulo").attr("action");
            let token = '{{ csrf_token() }}';
            
            // url += `/${tipo}/${value}`;
            // t.submit();  
            $.ajax({
                url: url,
                method: 'post',
                dataType: 'json',
                data: { page: tipo, title: value, _token:token},
                asy: false,
                success: function(result){
                    if(!result.estado) {
                        $("#formTitulo").find("button").html('Cambiar <i class="material-icons right">create</i>');
                    }
                    notificacion(result.txt,result.color);
                }
            });
        } else {
            
        }
    }
</script>
@endsection