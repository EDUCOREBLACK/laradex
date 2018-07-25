
@extends('layouts.app')



@section('title','trainers Edit')
@section('content')
<form method="POST" action="../../trainers/{{$trainer->slug }}" enctype="multipart/form-data" >
@method('PUT')
	
{{ csrf_field() }}
<div class="form-group">
	<label >Nombre </label>
	<input type="text" name="name" value="{{ $trainer->name }}" class="form-control"  required="">
</div>


<div class="form-group">
	<label >Descripcion </label>
	<textarea type="comment" name="description" rows="5"    class="form-control" required=""></textarea>
</div>

	<div class="form-group  ">

		  <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px" class="card-img-top rounded-circle d-block" src="../../images/{{$trainer->avatar}}" alt="">
	<label > Editar Avatar </label> 
	<input type="file" name="avatar">
	
	
</div>
<button type="submit" class="btn btn-primary">Actualizar</button>

</form>

@endsection