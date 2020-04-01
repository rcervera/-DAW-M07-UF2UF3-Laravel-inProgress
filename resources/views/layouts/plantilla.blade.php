<html>
<head>
</head>
<body>
	<a href="{{url('/')}}">Home</a>
	<a href="{{url('/productes')}}">Productes</a>
	<a href="{{url('/usuaris')}}">Usuaris</a>
	<a href="{{url('/projectes')}}">Projectes</a>

	@yield('contingut')
</body>
</html>