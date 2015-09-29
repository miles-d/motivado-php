@extends('master')

@section('content')
	<h3>Options</h3>
	<br>

	<div class="form-group">
      <div class="col-md-5">Your e-mail address: <b>{{ $user->email }}</b></div>
		<a href="{{ route('options.editEmail') }}"><button class="btn btn-sm btn-default">Change</button></a>
	</div>
	<br>

	<div class="form-group">
		<div class="col-md-5">Change your password</div>
		<a href="{{ route('options.editPassword') }}"><button role="submit" class="btn btn-sm btn-default">Change</button></a>
	</div>
	<br>

	<div class="form-group">
		<div class="col-md-5">Delete Account</div>
		<a href="{{ route('options.confirmDelete') }}"><button class="btn btn-sm btn-danger">Delete</button></a>
	</div>

@stop
