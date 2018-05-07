@extends('base')

@section('style')
<link href="{{ url('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('/assets/bootstrap/js/bootstrap.min.js') }}" rel="stylesheet">
<style>
.header {
    height: 50px;
    background-color: #2c3742;
}
.header .logo h1 {
    font-size: 30px;
    margin: 0px;
    padding: 10px 0px;
}
.header .logo h1 a{
	color: white;
}
.header .poster{
	height: initial;
}
.header .user{
	text-align: right;
	height: 100%;
	padding-top: 20px;
}
.header .user a{
	color: white;
	
}

.title-page{
	max-width: 400px;
    margin: auto;
}

.title-page > *{
	display: inline-block;
    padding-left: 50px;
    padding-right: 50px;
	padding-top: 5px;
	margin-top:  -10px;
	padding-bottom:5px;
	margin-bottom:20px;
	background:#2c3742;
	color: white;
	border-radius: 0px 0px 100px 100px; 
}

.full-wudth{
width: 100%;
}

.form-content{
	max-width: 500px;
    margin: auto;
	margin-top: 30px;
}
.form-content .row{
margin-bottom: 15px;
}

.col-xs-6.col-sm-4.col-md-3.text-center{
	padding:0px;
}
.col-xs-6.col-sm-4.col-md-3.text-center > a,
.col-xs-6.col-sm-4.col-md-3.text-center > a > img{
	width: 100%;
}
@media (min-width: 992px){
.col-md-3 {
    width: 25%;
}
}
</style>	
@endsection
<div class="header">
	<div class="container">
		<div class="row">
			<div class="logo col-xs-6">
	            <h1><a href="{{ url('/') }}">Video Club</a></h1>
	        	
			</div>
			<div class="user col-xs-6">
				@if ( Auth::guest() )
					<a href="{{ url('auth/login') }}">Login</a>
				@else
					<a href="{{ url('auth/logout') }}">Logout</a>
				@endif
			</div>
		</div>
	</div>
</div>
@section('menu')
@parent
<p>Este condenido es añadido al menú principal.</p>
@endsection
@section('content')
<p>Este apartado aparecerá en la sección "content".</p>
@endsection