@extends('layout')

@section('content')
<div class="title-page">
<h3>Login usuario.</h3>
</div>
<div class="form-content">
<form method="POST" action="{{url('/auth/login')}}">
{!! csrf_field() !!}
<div class="row">
<label class="col-sm-5" for="email">Email</label>
	<input class="col-sm-7" type="email" name="email" id="email" value="{{ old('email') }}">
	</div>
<div class="row">
	<label class="col-sm-5" for="password">Contraseña</label>
	<input class="col-sm-7" type="password" name="password" id="password">
</div>
<div class="row">
	<div class="col-sm-12">
	<input type="checkbox" name="remember"> Recuérdame
	</div>
</div>
<div>
	<div class="row">
		<div class="col-sm-12">
		<button type="submit" class="btn btn-default">Entrar</button>
		</div>
	</div>
</div>
</form>
</div>
@endsection