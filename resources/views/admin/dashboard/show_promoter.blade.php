@extends('admin.dashboard.layout')
@section('content')

    <div class="rd-container">
        <div class="rd-element rd-s-100">
            <a href="{{ route('admin.index') }}" class="btn btn-color-main">Volver</a>
        </div>
        <div class="rd-element rd-s-100 rd-l-60 center">
            <h2>Información del promotor</h2>
            <table>
                <tbody>
                    <tr>
                        <td><b>Nombre</b></td>
                        <td>{{ $promoter->name }}</td>
                    </tr>
                    <tr>
                        <td><b>Apellido</b></td>
                        <td>{{ $promoter->last_name }}</td>
                    </tr>
                    <tr>
                        <td><b>Document</b></td>
                        <td>{{ $promoter->document }}</td>
                    </tr>
                    <tr>
                        <td><b>Eliminado</b></td>
                        <td>{{ ($promoter->deleted != '0') ? 'Si':'No' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="rd-container">
        <div class="rd-element rd-s-100 rd-l-80 center">
            <h2>Registros realizados por el promotor</h2>
            @if(count($controls_day) == 0)

                <div class="rd-element rd-s-100 rd-l-60 center">
                    <h2>No existen registrados actualmente</h2>
                </div>

            @else
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
                    @foreach($controls_day as $control)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $control->date }}</td>
                            <td>{{ $control->type }}</td>
                            <td>
                                <a href="{{ route('admin.promoter.register.show', ['id_promoter' => $promoter->id, 'id_register' => $control->id]) }}">Ver</a>
                            </td>
                            {{-- <td>Editar  - Eliminar</td> --}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $controls_day->links() }}
            @endif
        </div>
    </div>
@endsection