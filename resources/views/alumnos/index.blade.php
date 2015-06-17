@extends('app')

@section('content')

<div class="container">
<div class="panel panel-default">
   <div class="panel-heading">
    <button type="button" class="btn btn-default" aria-label="Left Align">
	  <a href="{{action('AlumnosController@create')}}" class="glyphicon glyphicon-plus" ></a>
	 
 	 	<!--span class="glyphicon glyphicon-plus" aria-hidden="true"></span-->
	</button>
	Alumnos
	</div>

  <div class="panel-body">
@foreach ($alumnos as $alumno)
<div class="row">

<div class="col-md-3">	
<a href="{{action('AlumnosController@show',[$alumno->id])}}"> {{ $alumno->usi_nombre}}</a>
</div>
<div class="col-md-3">	
<a href="{{action('AlumnosController@show',[$alumno->id])}}"> {{ $alumno->usi_email}}</a>
</div>
<div class="col-md-1">	
<a href="{{action('AlumnosController@show',[$alumno->id])}}"> {{ $alumno->usi_dni}}</a>
</div>
<div class="col-md-1">
</div>
<div class="col-md-1">
{{ $alumno->apellido}}
</div>
</div>
@endforeach
</div>
</div></div>
@stop