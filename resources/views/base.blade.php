<html>
	<head>
		<title>Mi Web</title>
		@yield('style')
	</head>
	<body>
		@section('menu')
			Contenido del menu
		@endsection
		<div class="container">
			@yield('content')
		</div>
	</body>
</html>