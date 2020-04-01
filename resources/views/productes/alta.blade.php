@extends('layouts.plantilla')

@section('contingut')
<h3>Alta producte</h3>
<form method="POST" action="{{url('/productes/guardar')}}">
	@csrf
	nom <input type="text" name="nom" value="{{old("nom")}}"><br>
	preu <input type="text" name="preu" value="{{old("preu")}}"><br>
	descripcio <input type="text" name="descripcio" value="{{old("descripcio")}}"><br>
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