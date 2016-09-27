<div class="box-body">
  <div class="form-group">
      <label for="exampleInputName">Name</label>
       {!! Form::text('name', $value = null,['class'=>'form-control', 'placeholder'=>'Enter name']) !!}
  </div>
  <div class="form-group">
      <label for="exampleInputName">Roles</label>
      {!! Form::select('rol', $combobox, $selected, ['class'=>'form-control placeholder-no-fix']) !!}
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
      {!! Form::email('email', $value = null,['class'=>'form-control', 'placeholder'=>'Enter email']) !!}
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Password</label>
     {!! Form::password('password',['class'=>'form-control', 'placeholder'=>'Password']) !!}
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>