@extends('layouts.plantilla')

@section('contingut')
<h3>Alta usuari</h3>
<form method="POST" action="{{url('/usuaris/guardar')}}">
	@csrf
	nom <input type="text" name="name" value="{{old("name")}}"><br>
	email <input type="text" name="email" value="{{old("email")}}"><br>
	password <input type="text" name="password" value="{{old("password")}}"><br>
	<input type="submit" name="balta" value="Desar">
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection