<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ciudad Guárico - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="carlos mundaray">

    <title>Ciudad Guárico</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>
    <style type="text/css">
    	body{
    		padding: 0;
    		margin: 0;
    	}
    </style>
</head>
<body>
<div class="text-xs-center">
@foreach ($edicions as $edicion)
    <a href="{{asset(''.$edicion->pdf.'')}}" target="_black"><img class="img-responsive" src="{{ asset(''.$edicion->img.'') }}" alt="{{$edicion->name}}"></a>
@endforeach
</div>
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>
