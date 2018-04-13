<!-- View Partials para formularios de editar y crear nota
el helper old() me manteniene en memoria el ultimo cambio ejecutado en un campo
-->
<div class="form-group">
	<label for="">Título</label>
	{{--  <input value="{{ old('title',isset($note) ? $note->title : '') }}" type="text" class="form-control" id="title" name="title" placeholder="Escriba el título">--}}
	{!! Form::text('title', null, ['class'=>'form-control', 'placeholder' => 'Escriba el título']) !!}
</div>
<div class="form-group">
	{{--  <label for="">Nota</label>
	<textarea type="text" class="form-control" id="body" name="body" placeholder="Escriba nota">{{ old('body',isset($note) ? $note->body : '') }}</textarea>--}}
	{!! Form::textarea('body', null, ['class'=>'form-control', 'placeholder' => 'Escriba nota']) !!}
</div>

<div class="form-group">
	<label>Grupo</label>
	{{-- comentamos el select porque instalamos el paquete HTML & de Laravel Collective y lo vamos a construir con instrucciones del paquete --}}
	{{--  <select class="form-control" name="group_id" id="group_id">
		<option value="">--Ninguno--</option>
		@foreach($groups as $group)
			<option value="{{ $group->id }}"
				@if (!is_null(old('group_id')))
					{{ old('group_id') == $group->id ? 'selected' : ''}}
				@else
					@if(isset($note))
						{{ $note->group_id == $group->id ? 'selected' : ''}}
					@endif
				@endif

			>{{ $group->name }}</option>
		@endforeach
	</select>--}}
	{{-- 
		El primer parametro que recibe el Form::select() es el nombre del contro, en nuestro caso es group_id,  
		el segundo parametro es un array con todas las opciones que va a mostrar el select, 

		el tercer parametro es el valor que va a tener selecionado el select por defecto, sino queremos especificar un valor por defecto pasamos un null,

		en el cuarto parametro especificamos todas las especificaciones de html que queremos que tenga el control



	--}}
	{!!Form::select('group_id',$groups,null,['class' => 'form-control', 'placeholder' => '--Ninguno--' ] )!!}
</div>
<div class="checkbox">
	<label>
		<!-- Este hidden lo colocamos para que cuando no este tiltado el checkbox important llegue un valor 0 y se pueda actualizar/guardar -->
		<input type="hidden" value="0" name="important" id="important">
		<!-- preguntamos que si el valor que nos retorna !is_null(old('important')) no es nulo, lo cual quiere decir que si hay un valor que recordar, luego si el valor es 1 tildamos el checkbox, caso contrario no lo tildamos -->
		<!-- Validamos que este definida la nota isset($note) para determinar si es o no un formulario de edición. Luego preguntamos si la nota es importante $note->isImportant() para chequearla o no en la interfaz-->
		<!-- Para optimizar este codigo puedo usar laravel collective https://laravelcollective.com/-->
		
		{{--  
		@if (!is_null(old('important')))
			{{ old('important') == 1 ? 'checked' : ''}}
		@else
			@isset ($note)
				{{ $note->isImportant() ? 'checked' : '' }}
			@endisset
		@endif --}}
		{{-- 
			la función oldCheckbox se encuentra en la siguiente ruta 
			helpers/html.php
		 --}}


		{{--  <input type="checkbox" value="1" name="important" id="important"
		
			{{ oldCheckbox('important', (isset($note) ? $note : null)) }}
		>--}}
		{!! Form::checkbox('important', 1); !!}
		Es importante
	</label>
</div>