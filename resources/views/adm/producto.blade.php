@extends('adm.main')

@section('headTitle', 'Productos | Duro pisos')
@section('bodyTitle', 'Productos')

@section('body')
<main>
    @switch($tipo)
        @case('familia')
            <div class="container">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Familia de productos<button class="btn right"><i class="material-icons">add_circle</i></button></span>
                        <table class="striped">
                            <thead>
                                <th>Imagen</th>
                                <th>Título</th>
                                <th class="text-center">Orden</th>
                                <th class="text-center">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($familias as $familia)
                                    <tr>
                                        <td></td>
                                        <td>{{$familia["title"]}}</td>
                                        <td class="text-center">{{$familia["order"]}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary" onclick="edit('familia',{{$familia['id']}})"><i class="material-icons">create</i></button>
                                            <button type="button" class="btn btn-danger"><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @break;
        @case('uno')
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Productos<button class="btn right"><i class="material-icons">add_circle</i></button></span>
                    <table class="striped">
                        <thead>
                            <th>Imagen</th>
                            <th>Título</th>
                            <th>Familia</th>
                            <th class="text-center">Orden</th>
                            <th class="text-center">Acciones</th>
                        </thead>
                        <tbody>
                            {{-- @foreach($familias as $familia)
                                <tr>
                                    <td></td>
                                    <td>{{$familia["title"]}}</td>
                                    <td class="text-center">{{$familia["order"]}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" onclick="edit('familia',{{$familia['id']}})"><i class="material-icons">create</i></button>
                                        <button type="button" class="btn btn-danger"><i class="material-icons">delete</i></button>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
            @break;
    @endswitch
</main>
@endsection