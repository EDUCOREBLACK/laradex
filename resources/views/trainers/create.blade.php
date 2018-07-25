
@extends('layouts.app')



@section('title','trainers Create')
@section('content')

@if($errors->any())
  <div class="alert alert-danger">
  	<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
<form method="POST" action="{{ url('trainers') }}" enctype="multipart/form-data" >

	
{{ csrf_field() }}
<div class="form-group">
	<label for"">Nombre </label>
	<input type="text" name="name" class="form-control"  > 
</div>


<div class="form-group">
	<label for"">Descripcion </label>
	<textarea type="comment" name="description" rows="5"  class="form-control" ></textarea>
</div>

	<div class="form-group">
	<label for"">Avatar </label>
	<input type="file" name="avatar">
	
</div>
<button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection
