@extends('admin.login.layout')
@section('content')
    <div class="rd-container">
        <div class="rd-element rd-s-100 rd-l-40 center">
            <form id="login" action="{{ route('admin.sigin') }}" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" class="@error('email') is-invalid @enderror" required>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="@error('password') is-invalid @enderror" required> <br>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror

                @if(session()->exists('invalid_password'))
                    <div class="alert alert-danger">{{ session('invalid_password') }}</div>
                @endif
                <a href="#">¿Haz olvidado tu contraseña?</a>
                <div class="text-center">
                    <button class="btn btn-color-main">Ingresar</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection