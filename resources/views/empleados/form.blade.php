<h1> {{$modo}} empleado</h1>

@if(count($errors)>0)
	<div class="alert alert-danger" role="alert">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</div>
@endif

<div class="form-group">
	<label for="nombre" class="form-label">Nombre</label>
	<input type="text" class="form-control" name="nombre" id="nombre" value="{{ isset($empleado->nombre) ? $empleado->nombre: old('nombre') }}"><br>

	<label for="primer_apellido" class="form-label">Primer Apellido</label>
	<input type="text" class="form-control" name="primer_apellido" id="primer_apellido" value="{{ isset($empleado->primer_apellido) ? $empleado->primer_apellido: old('primer_apellido') }}"><br>

	<label for="segundo_apellido" class="form-label">Segundo Apellido</label>
	<input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" value="{{ isset($empleado->segundo_apellido) ? $empleado->segundo_apellido: old('segundo_apellido') }}"><br>

	<label for="correo" class="form-label">Correo</label>
	<input type="text" class="form-control" name="correo" id="correo" value="{{ isset($empleado->correo) ? $empleado->correo: old('correo') }}"><br>

	<label for="foto" class="form-label">Foto</label>
	@if (isset($empleado->foto))
		<img class="form-control" src="{{ asset('storage').'/'.$empleado->foto}}" width="100px" alt="">
	@endif
	<input class="form-control"  type="file" name="foto" id="foto" value=""><br>

	<input class="btn btn-success btn-block d-inline" type="submit" value="{{$modo}}">
	<a class="btn btn-primary btn-block d-inline" href="{{ route('empleado.index') }} ">Regresar</a>
</div>
