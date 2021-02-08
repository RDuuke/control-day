@extends('admin.dashboard.layout')
@section('content')

    <div class="rd-element rd-s-100 rd-l-40 center">
        <form action="{{ route('admin.promoter.update', ['id' => $promoter->id]) }}" method="POST" class="standar-form">
            @include('admin.dashboard.inputs.promoter.edit')
            <div class="text-center">
                <button class="btn btn-color-main">Guardar</button>
                <a href="{{ route('admin.index') }}" class="btn btn-default">Cancelar</a>
            </div>
        </form>
    </div>

@endsection