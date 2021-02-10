<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Detalle</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($promoter->controls_day as $control)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $control->date }} {{ $control->hour }}</td>
            <td>{{ $control->type }}</td>
            <td>
                <a href="{{ route('promoter.control.detail', ['id' => $control->id, 'iduser' => $promoter->id]) }}">Ver</a>
            </td>
            <td>
                <a href="{{ route('promoter.control.edit', ['id' => $control->id]) }}">Editar</a>
                - 
                <a href="{{ route('promoter.control.delete', ['id' => $control->id]) }}">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>