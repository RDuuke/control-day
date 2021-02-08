@extends('promoter.layout.layout')

@section('content')
    <div class="rd-container">
        <div class="rd-element rd-s-100 rd-l-40 center">
            <form action="{{ route('promoter.sing') }}" method="post" id="login">
                <label for="document">Documento de identidad</label>
                <input type="text" name="document" id="document" required>
                @error('document')
                    <small class="error">{{ $message }}</small>
                @enderror
                @csrf
                <button class="btn btn-color-main">Ingresar</button>
            </form>
        </div>
    </div>
@endsection