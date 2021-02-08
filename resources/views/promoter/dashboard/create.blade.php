@extends('promoter.dashboard.layout')

@section('content')
    <div class="rd-container">
        <div class="rd-element rd-s-100 rd-l-60 center" style="background-color: white">
            <h3>Nuevo registro</h3>
        </div>
        <div class="rd-element rd-s-100 rd-l-60 center" style="background-color: white">
            <form action="{{ route('promoter.controls.store', [ 'id' => session('promoter_id')]) }}" method="post" enctype="multipart/form-data">
                @include('promoter.dashboard.inputs.create')
                <div class="flex">
                    <button class="btn btn-color-main" style="margin-right: .5em">Guardar</button> 
                    <a href="{{ route('promoter.controls', [ 'id' => session('promoter_id')]) }}" class="btn btn-default">Cancelar</a>
                </div>
                <br>
            </form>
        </div>
    </div>
@endsection