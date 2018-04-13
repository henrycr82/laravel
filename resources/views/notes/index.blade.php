<!-- para que estienda o herede de nuestro layouts principal layouts/app.blade.php -->
@extends('layouts.app')
@section('title')
	Notas
@endsection

 <!-- Este es el contenido que voy a insertar en mi layout principal layouts/app.blade.php -->
@section('content')
	<div class="row">
		<div class="col-md-2">
			<h4>Grupos</h4>
			<ul class="list-group">
				<li class="list-group-item"><a href="/notes">Sin grupo</a></li>
				@foreach($groups as $group )
					<li class="list-group-item"><a href="/groups/{{$group->id}}/notes">{{ $group->name }}</a></li>
				@endforeach
				<li class="list-group-item"><a href="/notes/all">Todas</a></li>
			</ul>
		</div>
		<div class="col-md-10">
			<table class="table table-hover">
				  <thead>
				  	<tr>
				  		<th>Nota</th>
				  		<th>Grupo</th>
				  		<th>Editar</th>
				  		<th>Eliminar</th>
				  	</tr>
				  </thead>
				  <tbody>
						@foreach ($notes as $note)
					        <tr>
					        	<td>
					        	<!--<a href="notes/{ $note->id }">-->
					        		<!--como instanciamos el modelo Note en la carpeta routes-->
					        		<!--fichero web.php el href quede asi /notes/ -->
					        		<a href="/notes/{{ $note->id }}">
					        		{{ $note->title }} 
					        		<!-- { ($note->important) ? '*' : ''} -->
					        		<!-- aqui estoy usando la función  inImportan() del modelo Note.php -->
					        		@if ($note->isImportant())
					        			*
					        		@endif
					        		</a>
					        	</td>
					        	<td>
					        		@if ($note->group_id != null)
					        			<label class="label label-info">{{ $note->group->name }}</label></td>
					        		@endif
					        	<td>
					        		<a href="/notes/{{ $note->id }}/edit" class="btn btn-primary btn-sm">Editar</a>
					        	</td>
					        	<td>
					        		<form action="/notes/{{ $note->id }}" method="POST">
					        			@method('DELETE')
					        			@csrf
					        			<button type="button" class="btn btn-danger btn-sm btn-delete">Eliminar</button>
					        		</form>
					        	</td>
					       </tr>
					    @endforeach
				 </tbody>
			 </table>
		</div>
  	</div>
@endsection

@section('script')
	<script>
		$('.btn-delete').on('click', function(e){
			if(confirm('¿Está seguro de borrar la nota?'))
			{
				$(this).parents('form:first').submit();
			}
		})
	</script>
@endsection
