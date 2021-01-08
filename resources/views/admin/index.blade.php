@extends('admin.layout.layout')

@section('content')
    <div class="rd-container">
        <div class="rd-element rd-s-100 rd-l-60 rd-offset-20">
           <table>
               <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>CC</th>
                        <th>Acciones</th>
                    </tr>
               </thead>
               <tbody>
               @foreach($promoters as $promoter)
                   <tr>
                       <td>{{ $promoter->name }}</td>
                       <td>{{ $promoter->last_name }}</td>
                       <td>{{ $promoter->document }}</td>
                       <td><a href="{{ route('control-day', ['id' => $promoter->id]) }}">Ver historial</a></td>
                   </tr>
               @endforeach
               </tbody>
           </table>
        </div>
    </div>
@endsection