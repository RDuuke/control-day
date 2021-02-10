<label for="date">Fecha</label>
<input type="date" name="date" id="date" value="{{ $control->date }}" maxlenght="240" required>
@error('date')
    <small>{{ $message }}</small>
@enderror
<label for="hour">Hora</label>
<input type="time" name="hour" id="hour" value="{{ $control->hour }}" required>
@error('hour')
    <small>{{ $message }}</small>
@enderror
<label for="type">Tipo</label>
<select name="type" id="type" required>
    <option value="start" {{ ($control->type != 'end') ? 'selected':'' }}>Inicio</option>
    <option value="end" {{ ($control->type != 'start') ? 'selected':'' }}>Cierre</option>
</select>
@error('start')
    <small>{{ $message }}</small>
@enderror
<label for="description">Descripción</label>
<textarea name="description" id="description" maxlenght="240" required>{{ $control->description }}</textarea>
@error('description')
    <small>{{ $message }}</small>
@enderror
<label for="evidence">Evidencia</label>
<img src="{{ asset($control->evidence) }}" alt="Evidencia">
<div class="evidence-controls-edit">
    <input type="file" name="evidence" id="evidence">
</div>
{{-- 
@error('evidence')
    <small>{{ $message }}</small>
@enderror --}}
@csrf