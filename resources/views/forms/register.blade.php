    {!! Form::open(['route' => ['auth.register'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}

<div class="form-group">
  <label for="name" class="col-md-2 control-label">Name: </label>
  <div class="col-md-4">
    <input id="name" type="name" name="name" required autofocus>
  </div>
</div>

<div class="form-group">
  <label for="email" class="col-md-2 control-label">E-mail: </label>
  <div class="col-md-4">
    <input id="email" type="email" name="email"
            required>
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
          <label for="password-repeat" class="col-md-2 control-label">Re-type password: </label>
          <div class="col-md-4">
            <input id="password-repeat" type="password" name="password_confirmation"
            required>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-offset-2 col-sm-4">
            <input type="submit" value="Create Account">
            <p class="help-block">Alreade have an account? <b><a
                class="text-success" href="{{ route('auth.showLogin') }}">Log In</a></b></p>
          </div>
        </div>

    {!! Form::close() !!}
