    {!! Form::open(['route' => ['auth.register'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}

<div class="form-group">
  <label for="name" class="col-lg-2 control-label">Name: </label>
  <div class="col-lg-9">
    <input class="form-control" type="name" name="name" required autofocus>
  </div>
</div>

<div class="form-group">
  <label for="email" class="col-lg-2 control-label">E-mail: </label>
  <div class="col-lg-9">
    <input class="form-control" type="email" name="email" required>
          </div>
        </div>

        <div class="form-group">
          <label for="password" class="col-lg-2 control-label">Password: </label>
          <div class="col-lg-9">
            <input class="form-control" type="password" name="password" required>
          </div>
        </div>

        <div class="form-group">
          <label for="password-repeat" class="col-lg-2 control-label">Re-type password: </label>
          <div class="col-lg-9">
            <input class="form-control" type="password" name="password_confirmation" required>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-9">
            <button type="submit" class="btn btn-primary">Create Account</button>
            <div class="help-block"  id="toggle-login">
              <h4> Already have an account?</h4>
                <a href="{!! route('auth.showLogin') !!}">
                  <h3>Log In!</h3>
                </a>
            </div>
          </div>
        </div>

    {!! Form::close() !!}
