  {!! Form::open(['route' => ['auth.login'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}

<div class="form-group">
  <label for="email" class="col-md-2 control-label">E-mail: </label>
  <div class="col-md-4">
    <input id="email" type="email" name="email" required autofocus>
  </div>
</div>

<div class="form-group">
  <label for="password" class="col-md-2 control-label">Password: </label>
  <div class="col-md-4">
    <input id="password" type="password" name="password" 
          required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-offset-2">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember" value="remember"  checked>Remember me
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-offset-2 col-sm-4">
          <input type="submit" value="Log In">
          <p class="help-block">Don't have account yet? <b><a
              class="text-success" href="{!! route('auth.showRegister') !!}">Create new
              account</a></b></p>
        </div>
      </div>

  {!! Form::close() !!}
