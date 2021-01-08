@extends('admin.layout.layout')

@section('content')
    <div class="rd-container">
        <div class="rd-element rd-s-100 rd-l-90 center">
            <table>
                <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Fecha de promotor</th>
                    <th>Fecha de sistema</th>
                    <th>Descripción</th>
                    <th>Evidencia</th>
                </tr>
                </thead>
                <tbody>
                @foreach($controls as $control)
                    <tr>
                        <td>{{ $control->type == 'start' ? 'Inicio' : 'Cierre' }}</td>
                        <td>{{ $control->date }}</td>
                        <td>{{ $control->created_at }}</td>
                        <td><p>{{ $control->description }}</p></td>
                        <td><img src="https://www.masquenegocio.com/wp-content/uploads/2019/03/google-images-874x492.jpg" alt=""></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection