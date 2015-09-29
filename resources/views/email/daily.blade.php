@extends('email')

@section('content')

	<h3 id="header">You have things to do, {{ $user->name }}!</h3>
	<ul>
		@foreach( $tasksForToday as $task )
		<li>I want to <span class="description">{{ $task['description'] }}</span> because
		<span class="motivation">{{ $task['motivation'] }}</span></li>
		@endforeach
	</ul>

@stop
