@extends('adm.main')

@section('headTitle', 'Ventajas | Duro pisos')
@section('bodyTitle', 'Ventajas')

@section('body')
<main>
    <div class="container">
        @switch($seccion)
            @case("ventaja")
                
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Ventajas<button onclick="addRegistro('ventaja')" class="btn right"><i class="fas fa-plus"></i></button></span>
                
                        <table>
                            <thead>
                                <th>Ícono</th>
                                <th>Título</th>
                                <th>Orden</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @if(!empty($ventajas))
                                    @foreach($ventajas as $ventaja)
                                        <tr>
                                            <td></td>
                                            <td>{{$ventaja["title"]}}</td>
                                            <td class="text-center">{{$ventaja["order"]}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary" onclick="edit('ventaja',{{$ventaja['id']}})"><i class="material-icons">create</i></button>
                                                <button type="button" class="btn btn-danger"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">SIN DATOS</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                @break;
        @endswitch
    </div>
</main>
@endsection