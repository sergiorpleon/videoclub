@extends('layout')

@section('content')
<div class="title-page">
	<h3>Listado de películas.</h3>
</div>

	<div class="row">
	@foreach( $arrayPeliculas as $key => $pelicula )
@if($key%4==0)
</div>
<div class="row">
	@endif
	<div class="col-xs-6 col-sm-4 col-md-3 text-center">
		<a href="{{ url('/catalog/show/' . $pelicula['id'] ) }}">
			<img class="poster" src="{{$pelicula['poster']}}"/>
			<h4 style="min-height:45px;margin:5px 0 10px 0">
			{{$pelicula['title']}}
			</h4>
		</a>
	</div>
	
	@endforeach
</div>
<div class="row">
	@if ( !(Auth::guest()) )
		<a href="{{ url('/catalog/create/') }}"><button class="btn btn-success"><i class="glyphicon glyphicon-asterisk"></i>  Crear Película</button></a>
	@endif
</div>
			
@endsection