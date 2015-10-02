@extends('master')
@section('content')

	<h3>Options</h3>
	<div class="row">
      <div class="col-lg-5">Your e-mail address: <b>{{ $user->email }}</b></div>
		<a class="btn btn-sm btn-default col-lg-1" href="{{ route('options.editEmail') }}">Change</a>
	</div>
	<div class="row">
		<div class="col-lg-5">Change your password</div>
		<a class="btn btn-sm btn-default col-lg-1" href="{{ route('options.editPassword') }}">Change</a>
	</div>
	<div class="row">
		<div class="col-lg-5">Delete Account</div>
		<a class="btn btn-sm btn-danger col-lg-1" href="{{ route('options.confirmDelete') }}">Delete</a>
	</div>

@stop
