@extends('promoter.dashboard.layout')

@section('content')
    <div class="rd-container">
        {{-- <div class="rd-element rd-s-100 rd-l-60 center" style="background-color: white">
            <h3>Registros de {{ $promoter->full_name }}</h3>
        </div> --}}
        <div class="rd-element rd-s-100 rd-l-60 center" style="background-color: white">
            {{-- <p class="t-right"><a href="{{ route('promoter.logout') }}">Cerrar sesión</a></p> --}}
            <p><a href="{{ route('promoter.controls.create', ['id' => session('promoter_id')]) }}" class="btn btn-color-main">Agregar Nueva</a></p>
            <h2 class="mb-2em">Registros del promotor</h2>
            @include('promoter.dashboard.tables.index')
        </div>
    </div>
@endsection