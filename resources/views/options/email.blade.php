@extends('master')

@section('content')

<h4>Change e-mail address</h4>
<br>

<p>Your current e-mail address: <b>{{ $user->email }}</b></p>
<br>

{!! Form::open(['method' => 'post', 'route' => 'options.updateEmail', 'class' => 'form-horizontal']) !!}

	<div class="form-group">
		<label for="email" class="col-md-2 control-label">New E-mail: </label>
		<div class="col-md-4">
			<input id="email" type="email" name="email" required>
		</div>
	</div>

	<div class="form-group">
		<label for="email_confirmation" class="col-md-2 control-label">Confirm E-mail: </label>
		<div class="col-md-4">
			<input id="email" type="email" name="email_confirmation" required>
		</div>
	</div>

	<button role="submit" class="btn btn-success col-md-offset-2">Change</button>

{!! Form::close() !!}

@stop
