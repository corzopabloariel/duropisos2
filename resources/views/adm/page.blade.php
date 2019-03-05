@extends('adm.main')

@section('headTitle', 'Página | Duro pisos')
@section('bodyTitle', 'Página')

@section('body')
<main>
    <div class="container">
        @switch($seccion)
            @case('home')
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Empresa<button class="btn right"><i class="material-icons">create</i></button></span>
                        <h4>Título</h4>
                        <p>{{ $empresa["title_resume"] }}</p>
                        <h4>Subtítulo</h4>
                        <p>{{ $empresa["subtitle_resume"] }}</p>
                        <h4>Descrupción</h4>
                        <p><span class="text-truncate">{{ $empresa["text_resume"] }}</span></p>
                        <h4>Imagen</h4>
                        <p><img class="materialboxed img" src="{{ $empresa['image_resume'] }}"  onError="this.src='{{ asset('img/general/no-img.png') }}'" /></p>
                    </div>
                </div>
                <hr/>
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Servicio integral<button class="btn right"><i class="material-icons">create</i></button></span>
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
                @break
            @case('empresa')
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Empresa<button class="btn right"><i class="material-icons">create</i></button></span>
                        <h4>Título</h4>
                        <p>{{ empty($empresa["title"]) ? "Sin título" : $empresa["title"] }}</p>
                        <h4>Subtítulo</h4>
                        <p>{{ empty($empresa["subtitle"]) ? "Sin subtítulo" : $empresa["subtitle"] }}</p>
                        <h4>Descrupción</h4>
                        <p><span class="text-truncate">{{ empty($empresa["text"]) ? "Sin descripción" : $empresa["text"] }}</span></p>
                        <h4>Imagen</h4>
                        <p><img class="materialboxed img" src="{{ $empresa['image'] }}" onError="this.src='{{ asset('img/general/no-img.png') }}'" /></p>
                    </div>
                </div>
                @break;
            @case("producto")
            @case("aplicacion")
            @case("trabajo")
            @case("pregunta")
            @case("ventaja")
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
                @break;
        @endswitch
    </div>
</main>
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace('frm_texto');
    CKEDITOR.config.width = '100%';
    
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