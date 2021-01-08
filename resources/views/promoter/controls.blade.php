@extends('promoter.layout.layout')

@section('content')
    <div class="rd-container">
        <div class="rd-element rd-s-100 rd-l-60 center" style="background-color: white">
            <h3>Registros de {{ $promoter->full_name }}</h3>
        </div>
        <div class="rd-element rd-s-100 rd-l-60 center" style="background-color: white">
            <p class="t-right"><a href="{{ route('promoter.logout') }}">Cerrar sesión</a></p>
            <p><a href="{{ route('promoter.controls.create', ['id' => $promoter->id]) }}">Agregar Nueva</a></p>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Detalle</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($promoter->controls_day as $control)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $control->date }}</td>
                        <td>{{ $control->type }}</td>
                        <td>
                            <a href="{{ route('promoter.control.detail', ['id' => $control->id, 'iduser' => $promoter->id]) }}">Ver</a>
                        </td>
                        <td>Editar  - Eliminar</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection