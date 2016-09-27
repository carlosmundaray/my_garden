@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('ajax-css')
<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset('/plugins/morris/morris.css') }}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{ asset('/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('/plugins/daterangepicker/daterangepicker.css') }}">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<!-- DataTables -->
	<link href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.12/r-2.1.0/datatables.min.css"/>
 

@endsection

@section('main-content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Consulta Periodicos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class=" table table-bordered  display responsive no-wrap" width="100%">
            <thead>
            <tr>
              <th>id</th>
              <th>Nombre de periodico</th>
              <th>Url de la imagen</th>
              <th>link de pdf</th>
			        <th>Action</th>
            </tr>
            </thead>
            <tbody>
			@foreach ($periodicos as $periodico)				
            <tr>
              <td>{{ $periodico->id }}</td>
              <td>{{ $periodico->name }}</td>
              <td><a href="{{asset(''.$periodico->img.'')}}" target="_black"><img width="40" class="img-responsive" src="{{ asset(''.$periodico->img.'') }}" alt="{{$periodico->name}}"></a></td>
              <td><a href="{{asset(''.$periodico->pdf.'')}}" target="_black"><img width="40" class="img-responsive" src="{{ asset(''.$periodico->img.'') }}" alt="{{$periodico->name}}"></a></td>

			  <td>
				 {!! Form::hidden('id', $periodico->id, array('placeholder' => 'id', 'class'=> 'form-control', 'id'=>'id')) !!}
				 {!! link_to_route('periodico.edit', $title = 'Modificar', $parameters = $periodico->id, $attributes = ['class'=>'btn btn-primary btn-xs purple'])!!} &#160;
				 {!! Form::open(array('route' => array('periodico.destroy', $periodico->id), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
				 {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
				 {!! Form::close() !!}			 
            </tr>
			@endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>id</th>
              <th>Nombre de periodico</th>
              <th>Url de la imagen</th>
              <th>link de pdf</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@stop

@section('ajax-script')
<!-- DataTables -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.12/r-2.1.0/datatables.min.js"></script>
<!-- page script -->
<script>
  $(function () {
$('#example1').DataTable({
    "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
    responsive: true,
    "aaSorting": [[ 0, "desc" ]]
});

});
</script>
@endsection