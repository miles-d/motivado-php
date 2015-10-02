{!! Form::open(['method' => 'post', 'route' => 'options.updateEmail', 'class' => 'form-horizontal']) !!}
<fieldset>
  <div class="form-group">
    <label for="email" class="col-lg-2 control-label">New E-mail: </label>
    <div class="col-lg-9">
      <input class="form-control" type="email" name="email" autofocus required>
    </div>
  </div>
  <div class="form-group">
    <label for="email_confirmation" class="col-lg-2 control-label">Confirm E-mail: </label>
    <div class="col-lg-9">
      <input class="form-control" type="email" name="email_confirmation" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-2">
      <button type="submit" class="btn btn-success">Change</button>
    </div>
  </div>
</fieldset>
{!! Form::close() !!}
