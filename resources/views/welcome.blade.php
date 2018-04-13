 <!-- para que estienda o herede de nuestro layouts principal layouts/app.blade.php /> -->
@extends('layouts.app')

@section('title')
  Welcome
@endsection

 <!-- Este es el contenido que voy a insertar en mi layout principal layouts/app.blade.php /> -->
@section('content')
  <h1>Bienvenido a {{ config('app.name') }}</h1>
@endsection