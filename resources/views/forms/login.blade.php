  {!! Form::open(['route' => ['auth.login'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
<fieldset>
  <div class="form-group">
    <label for="email" class="col-lg-2 control-label">E-mail: </label>
    <div class="col-lg-9">
      <input class="form-control" type="email" name="email" required autofocus>
    </div>
  </div>

  <div class="form-group">
    <label for="password" class="col-lg-2 control-label">Password: </label>
    <div class="col-lg-9">
      <input class="form-control" type="password" name="password" required>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="remember" value="remember"  checked>Remember me
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-9">
      <button type="submit" class="btn btn-primary">Log In</button>
      <div class="help-block"  id="toggle-login">
        <h4> Don't have account yet?</h4>
              <a class="" href="{!! route('auth.showRegister') !!}">
                <h3>Create new account!</h3>
              </a>
            </h4>
          </div>
        </div>
      </div>
</fieldset>
{!! Form::close() !!}
