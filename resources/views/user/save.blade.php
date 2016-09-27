<?php if(Auth::user()->id == 1){ ?>
@extends('layouts.app')

@section('htmlheader_title')
	Registro de Usuario
@endsection
@section('main-content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Registro de Usuario</h3>
            </div>
			@if($errors->has())
	            <div class="alert alert-warning" role="alert">
	               @foreach ($errors->all() as $error)
	                  <div>{{ $error }}</div>
	              @endforeach
	            </div>
	        @endif </br>  
            <!-- form start -->
	  {!! Form::open(['route' => 'user.store', 'method' => 'POST', 'role' => 'form']) !!}
       @include("user.form.form")
      {{Form::close()}}
</div>
@stop
<?php } ?>