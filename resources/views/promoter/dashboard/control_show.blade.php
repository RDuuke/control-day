@extends('promoter.dashboard.layout')

@section('content')
    <div class="rd-container">
        <div class="rd-element rd-s-100 rd-l-60 center">
            {{-- <p>Fecha: {{ $control->date }}</p>
            <p>Tipo: {{ $control->type }}</p>
            <p>Descripción: {{ $control->description }}</p>
            <p>
                Evidencia: <br>
                <img src="{{ asset($control->evidence) }}" alt="">
            </p> --}}
            @include('promoter.dashboard.tables.control_show')
            <p class="t-right"><a href="{{ route('promoter.controls', [ 'id' => session('promoter_id')]) }}" class="btn btn-color-main">Volver</a></p>
        </div>
    </div>
@endsection