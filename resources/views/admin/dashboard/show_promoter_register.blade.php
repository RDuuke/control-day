@extends('admin.dashboard.layout')
@section('content')
    <div class="rd-container">
        {{-- <div class="rd-element rd-s-100 rd-l-60 center">
            <p>Fecha: {{ $control->date }}</p>
            <p>Tipo: {{ $control->type }}</p>
            <p>Descripción: {{ $control->description }}</p>
            <p>
                Evidencia: <br>
                <img src="{{ asset($control->evidence) }}" alt="">
            </p>
            <p class="t-right"><a href="{{ route('admin.promoter.show', [ 'id' => session('admin_user')['id'] ]) }}">Volver</a></p>
        </div> --}}

        <div class="rd-element rd-s-100 rd-l-60 center">
            <h2>Información del registro de {{ $promoter->name }} {{ $promoter->last_name }}</h2>
            <a href="{{ route('admin.promoter.show', [ 'id' => session('admin_user')['id'] ]) }}" class="btn btn-color-main">Volver</a>
            <table>
                <tbody>
                    <tr>
                        <td><b>Fecha</b></td>
                        <td>{{ $control->date }}</td>
                    </tr>
                    <tr>
                        <td><b>Tipo</b></td>
                        <td>{{ $control->type }}</td>
                    </tr>
                    <tr>
                        <td><b>Descripción</b></td>
                        <td>{{ $control->description }}</td>
                    </tr>
                    <tr>
                        <td><b>Evidencia</b></td>
                        <td><img src="{{ asset($control->evidence) }}" alt=""></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection