@extends('admin.dashboard.layout')
@section('content')

    <div class="rd-container">

    
        {{-- <div class="rd-element rd-s-100 rd-l-60 center" style="background-color: white">
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
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $promoters->links() }}
        </div> --}}
    </div>
@endsection