@extends('layouts.app')

@section('content')
	<form action="{{ route('empleado.update', $empleado->id) }}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		@include('empleados.form', ['modo' => 'Editar'])
		{{-- <input type="text" name="id" id="id" value="{{$empleado->id}}"> --}}
	</form>
@endsection
