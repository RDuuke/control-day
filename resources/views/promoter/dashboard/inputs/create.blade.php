<label for="date">Fecha</label>
<input type="date" name="date" id="date" maxlenght="240" required>
@error('date')
    <small>{{ $message }}</small>
@enderror
<label for="hour">Hora</label>
<input type="time" name="hour" id="hour" required>
@error('hour')
    <small>{{ $message }}</small>
@enderror
<label for="type">Tipo</label>
<select name="type" id="type" required>
    <option value="start">Inicio</option>
    <option value="end">Cierre</option>
</select>
@error('start')
    <small>{{ $message }}</small>
@enderror
<label for="description">Descripción</label>
<textarea name="description" id="description" maxlenght="240" required></textarea>
@error('description')
    <small>{{ $message }}</small>
@enderror
<label for="evidence">Evidencia</label>
<input type="file" name="evidence" id="evidence" required>
@error('evidence')
    <small>{{ $message }}</small>
@enderror
@csrf