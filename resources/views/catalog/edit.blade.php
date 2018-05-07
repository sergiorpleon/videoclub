@extends('layout')

@section('content')
<div class="title-page">
	<h3>Editar película.</h3>
</div>
	
@if(count($errors) > 0)
<div class="errors">
	<ul>
	@foreach($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif

<form enctype="multipart/form-data" method="POST">
{{ csrf_field() }}

	<div class="form-group">
		<label for='title'>Título</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="title" id="title" value="{{$pelicula->title}}">
		</div>
	</div>
	<div class="form-group">
		<label for='year'>Año</label>
		<div class="form-controls">
			<input type="text" name="year" id="year" value="{{ $pelicula->year}}">
		</div>
	</div>
	<div class="form-group">
		<label for='director'>Director</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="director" id="director" value="{{ $pelicula->director}}">
		</div>
	</div>
	<div class="form-group">
		<label for='photo'>Poster</label>
		<label>Imagen: {{ $pelicula->poster}}</label>
		<div class="form-controls">
			<input class="full-wudth" type="file" name="photo" id="photo" value="{{ old('photo')}}">
		<!--input type="text" name="photo" id="photo" value="{{ old('photo')}}" -->
		</div>
	</div>
	<div class="form-group">
		<label for='rented'>Rentado</label>
		<div class="form-controls">
			<input type="checkbox" name="rented" id="rented" value="{{ $pelicula->rented}}">
		</div>
	</div>	
	<div class="form-group">
		<label for='synopsis'>Synopsis</label>
		<div class="form-controls">
			<textarea class="full-wudth" name="synopsis" id="synopsis" rows="4" cols="50">{{ $pelicula->synopsis}}</textarea>
		</div>
	</div>
<button type="submit">Salvar</button>
</form>
@endsection