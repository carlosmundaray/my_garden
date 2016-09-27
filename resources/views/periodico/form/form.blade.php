
<div class="box-body">
  <div class="form-group">
      <label for="exampleInputName">Nombre</label>
       {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre de la edicion']) !!}
  </div>  
  <div class="form-group">
      <label for="exampleInputName">Fecha de Activacion</label>
       {{ Form::text('fecha_active', NULL, ['class'=>'form-control pull-right', 'id'=>'datepicker','placeholder'=>'Fecha de activacion'] ) }}
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Imagen</label>
      {!! Form::file('image', null, ['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Pdf</label>
      {!! Form::file('pdf', null, ['class'=>'form-control']) !!}
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>