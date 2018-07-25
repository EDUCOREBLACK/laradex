@extends('layouts.app')



@section('title','trainers ')
@section('content')


@if(session('status'))

<div class="alert  alert-success" >
    {{ session('status') }}

    </div>
@endif

   <img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px" class="card-img-top rounded-circle mx-auto d-block" src="../images/{{$trainer->avatar}}" alt="">
  <div class="text-center">

     <h5 class="card-title">{{$trainer->name}}</h5>
       <p class="card-title">{{$trainer->description}}</p>
<a href="{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
   
{!! Form::open([ 'route'=>['trainers.destroy',$trainer->slug], 'method'=>'DELETE']) !!}

{!! Form::submit('eliminat',['class'=>'btn btn-danger']) !!}
{!! Form::close() !!}

    </div>



 


@endsection