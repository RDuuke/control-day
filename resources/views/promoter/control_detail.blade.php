@extends('promoter.layout.layout')

@section('content')
    <div class="rd-container">
        <div class="rd-element rd-s-100 rd-l-60 center" style="background-color: white">
            <p class="t-right"><a href="{{ route('promoter.logout') }}">Cerrar sesión</a></p>
            <p>Fecha: {{ $control->date }}</p>
            <p>Tipo: {{ $control->type }}</p>
            <p>Descripción: {{ $control->description }}</p>
            <p>
                Evidencia: <br>
                <img src="{{ asset($control->evidence) }}" alt="">
            </p>
            <p class="t-right"><a href="{{ route('promoter.controls', [ 'id' => session('promoter_id')]) }}">Volver</a></p>
        </div>
    </div>
@endsection