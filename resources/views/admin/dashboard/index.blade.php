@extends('admin.dashboard.layout')

@section('content')

    <div class="rd-container">
        <div class="rd-element rd-s-100 rd-l-60">
            <a href="{{ route('admin.promoter.create') }}" class="btn btn-color-main">Agregar promotor</a>
        </div>
        @if(session()->exists('result'))
            <div class="{{ session('result')['type'] }}">
                {{ session('result')['message'] }}
            </div>
        @endif
        @if(count($promoters) == 0)

            <div class="rd-element rd-s-100 rd-l-60 center">
                <h2>No existen promotores registrados actualmente</h2>
            </div>

        @else
        
            <div class="rd-element rd-s-100 rd-l-60 center" style="background-color: white">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Eliminado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($promoters as $promoter)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $promoter->document }}</td>
                                <td>{{ $promoter->name }}</td>
                                <td>{{ $promoter->last_name }}</td>
                                <td>{{ ($promoter->deleted != '0') ? 'Si':'No' }}</td>
                                <td>
                                    <a href="{{ route('admin.promoter.edit', ['id' => $promoter->id]) }}">Editar</a> 
                                    - 
                                    @if($promoter->deleted == '1')
                                        <a href="{{ route('admin.promoter.reintegrate', ['id' => $promoter->id]) }}">Reintegrar</a>
                                    @else
                                        <a href="{{ route('admin.promoter.delete', ['id' => $promoter->id]) }}">Eliminar</a>
                                    @endif
                                    -
                                    <a href="{{ route('admin.promoter.show', ['id' => $promoter->id]) }}">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $promoters->links() }}
            </div>
            
        @endif
    </div>
@endsection