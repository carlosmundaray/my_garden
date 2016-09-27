@extends('layouts.app')

@section('htmlheader_title')
	Registro de Usuario
@endsection
@section('ajax-css')
 <!-- bootstrap datepicker -->
 <link rel="stylesheet" href="{{ asset('/plugins/datepicker/datepicker3.css')}}">
 <style type="text/css">
    .datepicker {z-index: 1151 !important;}
 </style>
@endsection
@section('main-content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Registro del Periodico</h3>
            </div>
			@if($errors->has())
	            <div class="alert alert-warning" role="alert">
	               @foreach ($errors->all() as $error)
	                  <div>{{ $error }}</div>
	              @endforeach
	            </div>
	        @endif </br>  
            <!-- form start -->

        @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
         <div>{!! Session::get('success') !!}</div>
          </div>
        @endif

{!! Form::open(['route' => 'periodico.store', 'method' => 'POST', 'role' => 'form', 'files' => true]) !!}
       @include("periodico.form.form")
      {{Form::close()}}
</div>
@stop

@section('ajax-script')
<!-- bootstrap datepicker -->
<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">
//Date picker
    $('#datepicker').datepicker({
      autoclose: true,
    format: 'yyyy/mm/dd'
    });
</script>
@endsection