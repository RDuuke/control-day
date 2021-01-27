@extends('admin.dashboard.layout')
@section('content')

    <div class="rd-element rd-s-100 rd-l-40 center">
        <form action="{{ route('admin.promoter.store') }}" method="POST" class="standar-form">

            <label for="name">Nombre</label> <br>
            <input type="text" name="name" class="@error('name') is-invalid @enderror" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="lastname">Apellido</label> <br>
            <input type="text" name="last_name" class="@error('last_name') is-invalid @enderror" required> <br>
            @error('last_name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="document">Documento de identidad</label> <br>
            <input type="text" name="document" class="@error('lastname') is-invalid @enderror" required>
            @error('document')
                <div class="error">{{ $message }}</div>
            @enderror
            {{-- @if(session()->exists('invalid_password'))
                <div class="error">{{ session('invalid_password') }}</div>
            @endif --}}
            <div class="text-center">
                <button class="btn btn-color-main">Guardar</button>
                <a href="{{ route('admin.index') }}" class="btn btn-default">Cancelar</a>
            </div>
            @csrf
        </form>
    </div>

@endsection