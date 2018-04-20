@extends('layouts.app')
@section('title')
	Editar
@endsection

@section('content')
	{{-- <form action="/notes/{{ $note->id }}" method="POST" role="form"> --}}
		{{-- @method('PATCH')
		@csrf --}}
		{{-- comentamos el formulario anterior porque instalamos el paquete HTML & de Laravel Collective y lo vamos a construir con instrucciones del paquete
		en la sección de codigo : '/notes/{{ $note->id}}' no hace falta las llaves dobles porque estamos dentro de php o tambien podriamos hacer una concatenación de la siguiente manera
		"/notes/".$note->id
		--}}
		{!! Form::model($note,['url' => "/notes/{$note->id}", 'method' => 'PATCH']) !!}
			<legend>Ediatr nota</legend>
			@include('layouts/_validations_errors')
			@include('notes/_form')
			<button type="submit" class="btn btn-primary">Actualizar</button>
		{!! Form::close() !!}
	{{-- </form> --}}
@endsection