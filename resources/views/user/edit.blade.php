<?php if(Auth::user()->id == 1){ ?>
@extends('layouts.app')

@section('htmlheader_title')
	Registro de Usuario
@endsection
@section('main-content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modificar de Usuario</h3>
            </div>
			@if($errors->has())
	            <div class="alert alert-warning" role="alert">
	               @foreach ($errors->all() as $error)
	                  <div>{{ $error }}</div>
	              @endforeach
	            </div>
	        @endif </br>  
            <!-- form start -->
            {!! Form::model($users, array('route' => array('user.update', $users->id), 'method' => 'PUT'), array('role' => 'form', 'class'=>'form-horizontal')) !!}
            @include('user.form.form')
            {!! Form::close() !!}
</div>
@stop
<?php } ?>