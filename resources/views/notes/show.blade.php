<!-- para que estienda o herede de nuestro layouts principal layouts/app.blade.php /> -->
@extends('layouts.app')
@section('title')
	Detalle Notas
@endsection

 <!-- Este es el contenido que voy a insertar en mi layout principal layouts/app.blade.php /> -->
@section('content')
  	<h1>Titulo: {{ $note->title }}</h1>
	<p>Body: {{ $note->body }}</p>
@endsection