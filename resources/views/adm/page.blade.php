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
                        <span class="card-title">Empresa</span>
                        <h3>Título</h3>
                        <p>{{ $empresa["title_resume"] }}</p>
                        <h3>Subtítulo</h3>
                        <p>{{ $empresa["subtitle_resume"] }}</p>
                        <h3>Descrupción</h3>
                        <p><span class="text-truncate">{{ $empresa["text_resume"] }}</span></p>
                        <h3>Imagen</h3>
                        <p>{{ $empresa["image_resume"] }}</p>
                    </div>
                </div>
                <hr/>
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Servicio integral</span>
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
        
            @default
                Default case...
        @endswitch
    </div>
</main>
@endsection