<table>
    <tbody>
        <tr>
            <td><b>Fecha</b></td>
            <td>{{ $control->date }}</td>
        </tr>
        <tr>
            <td><b>Tipo</b></td>
            <td>{{ $control->type }}</td>
        </tr>
        <tr>
            <td><b>Descripción</b></td>
            <td>{{ $control->description }}</td>
        </tr>
        <tr>
            <td colspan="2"><b>Evidencia</b></td>
        </tr>
        <tr>
            <td colspan="2"><img src="{{ asset($control->evidence) }}" alt=""></td>
        </tr>
    </tbody>
</table>