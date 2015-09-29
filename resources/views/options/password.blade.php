@extends('master')

@section('content')

<h4>Change password</h4>
<br>

{!! Form::open(['method' => 'post', 'route' => 'options.updatePassword', 'class' => 'form-horizontal']) !!}

	<div class="form-group">
		<label for="password" class="col-md-2 control-label">New password: </label>
		<div class="col-md-4">
			<input id="password" type="password" name="password" required>
		</div>
	</div>

	<div class="form-group">
		<label for="password_confirmation" class="col-md-2 control-label">Confirm password: </label>
		<div class="col-md-4">
			<input id="password" type="password" name="password_confirmation" required>
		</div>
	</div>

	<button role="submit" class="btn btn-success col-md-offset-2">Change</button>

{!! Form::close() !!}
@stop
