<label for="name">Nombre</label> <br>
<input type="text" name="name" value="{{ $promoter->name }}" class="@error('name') is-invalid @enderror" required>
@error('name')
    <div class="error">{{ $message }}</div>
@enderror

<label for="lastname">Apellido</label> <br>
<input type="text" name="last_name" value="{{ $promoter->last_name }}" class="@error('last_name') is-invalid @enderror" required> <br>
@error('last_name')
    <div class="error">{{ $message }}</div>
@enderror

<label for="document">Documento de identidad</label> <br>
<input type="text" name="document" value="{{ $promoter->document }}" class="@error('lastname') is-invalid @enderror" required>
@error('document')
    <div class="error">{{ $message }}</div>
@enderror
{{-- @if(session()->exists('invalid_password'))
    <div class="error">{{ session('invalid_password') }}</div>
@endif --}}
@csrf