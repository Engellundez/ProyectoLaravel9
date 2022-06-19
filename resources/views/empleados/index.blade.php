@extends('layouts.app')

@section('content')
	@if ( Session::has('mensaje'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{Session::get('mensaje')}}

			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	@endif
	<a href="{{ route('empleado.create') }}" class="btn btn-success mb-4">Registrar Nuevo Empleado</a>

	<table class="table table-dark">
		<thead class="thead-dark">
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Foto</th>
				<th class="text-center">Nombre</th>
				<th class="text-center">Primer Apellido</th>
				<th class="text-center">Segundo Apellido</th>
				<th class="text-center">Correo</th>
				<th class="text-center">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($empleados as $empleado)
				<tr>
					<td class="text-center">{{ $empleado->id }}</td>
					<td class="text-center">
						<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" width="150px" alt="">
					</td>
					<td class="text-center">{{ $empleado->nombre }}</td>
					<td class="text-center">{{ $empleado->primer_apellido }}</td>
					<td class="text-center">{{ $empleado->segundo_apellido }}</td>
					<td class="text-center">{{ $empleado->correo }}</td>
					<td class="text-center">
						<a href="{{ route('empleado.edit', $empleado->id) }}" class="btn btn-warning">
							Editar
						</a>
						|
						<form action="{{ route('empleado.destroy', $empleado->id) }}" class="d-inline" method="post">
							@csrf
							@method('delete')
							<input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Eliminar al empleado?')" value="Borrar">
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{$empleados->links()}}
@endsection
