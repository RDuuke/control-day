@extends('promoter.layout.layout')

@section('content')
    <div class="rd-container">
        <div class="rd-element rd-s-100 rd-l-60 center" style="background-color: white">
            <h3>Nuevo registro</h3>
        </div>
        <div class="rd-element rd-s-100 rd-l-60 center" style="background-color: white">
            <p class="t-right"><a href="{{ route('promoter.logout') }}">Cerrar sesión</a></p>
            <form action="{{ route('promoter.controls.store', [ 'id' => session('promoter_id')]) }}" method="post" enctype="multipart/form-data">
                @include('promoter.inputs.input')
                <button>Guardar</button>
                <br>
            </form>
        </div>
    </div>
@endsection