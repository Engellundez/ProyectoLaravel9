@extends('layouts.app')

@section('content')
	<form action="{{route('empleado.store')}}" method="post" enctype="multipart/form-data">
		@csrf
		@include('empleados.form', ['modo' => 'Crear'])

	</form>
@endsection
