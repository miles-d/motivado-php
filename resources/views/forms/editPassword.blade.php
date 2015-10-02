{!! Form::open(['method' => 'post', 'route' => 'options.updatePassword', 'class' => 'form-horizontal']) !!}
<fieldset>
  <div class="form-group">
    <label for="password" class="col-lg-2 control-label">New password: </label>
    <div class="col-lg-9">
      <input class="form-control" type="password" name="password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="password_confirmation" class="col-lg-2 control-label">Confirm password: </label>
    <div class="col-lg-9">
      <input class="form-control" type="password" name="password_confirmation" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-2">
      <button type="submit" class="btn btn-success">Change</button>
    </div>
  </div>
</fieldset>
{!! Form::close() !!}
