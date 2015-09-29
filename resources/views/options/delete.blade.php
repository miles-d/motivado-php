@extends('master')

@section('content')
	<h3>Delete Account</h3>
	<br>

	{!! Form::open(['method' => 'post', 'route' => 'options.delete', 'class' => 'form-horizontal']) !!}
	<h4 class="text-warning">You are going to delete your account. This will permamently delete all your data
from this site.</h4><br>
	<button class="btn btn-danger" role="submit">Yes, delete my account</button>
	{!! Form::close() !!}

@stop
