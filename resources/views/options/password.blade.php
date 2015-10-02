@extends('master')
@section('content')

<h3>Change password</h3>
<p class="help-block">Password has to be at least 6 characters long.</p>
@include('forms.editPassword')

@stop
