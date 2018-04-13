@extends('layouts.app')
@section('title')
	Crear Nota
@endsection

 <!-- Este es el contenido que voy a insertar en mi layout principal layouts/app.blade.php /> -->
@section('content')
	<form action="/notes" method="POST" role="form">
		@csrf
		<legend>Crear nueva nota</legend>
		@include('layouts/_validations_errors')
		@include('notes/_form')
		<button type="submit" class="btn btn-primary">Crear</button>
	</form>
@endsection