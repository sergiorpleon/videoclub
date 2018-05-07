@extends('layout')

@section('content')
<div class="title-page">
<h3>Vista detalle película.</h3>
</div>
<div class="row">
	<div class="col-sm-4">
		{{-- TODO: Imagen de la película --}}
		<a href="{{ url('/catalog/edit/' . $key ) }}">
			<img class="poster" src="{{$pelicula['poster']}}"/>
		</a>
	</div>
	<div class="col-sm-8">
		<div>
			<a href="{{ url('/catalog/edit/' . $key ) }}">
				<h2 style="min-height:35px;margin:5px 0 10px 0">
					<strong>{{$pelicula['title']}}</strong>
				</h2>
			</a>
			
		</div>
	
		<div>
			<h4>Año: {{$pelicula['year']}}</h4>
		</div>
		<div>
			<h4>Director: {{$pelicula['director']}}</h4>
		</div>
		<div style="margin-top: 40px;">
			<strong>Resumen: </strong>{{$pelicula['synopsis']}}
		</div>
		<div style="margin-top: 20px; margin-bottom: 40px;">
			<strong>Estado: </strong>
			@if ( $pelicula['rented'] == 1 )
			Película actualmente alquilada
			@else
			Disponible
			@endif
		</div>
		<div>
			@if ( !(Auth::guest()) )
				<a href="{{ url('/catalog/return/' . $key ) }}"><button class="btn btn-danger">
					@if ( $pelicula['rented'] == 1 )
					Devolver Película
					@else
					Rentar Película
					@endif
					</button></a>
				<a href="{{ url('/catalog/edit/' . $key ) }}"><button class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i>  Editar Película</button></a>
			@endif
				<a href="{{ url('/catalog/') }}"><button class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span>  Volver al Listado</button></a>
		</div>	
	</div>
</div>
@endsection