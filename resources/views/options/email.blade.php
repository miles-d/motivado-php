@extends('master')
@section('content')

<h3>Change e-mail address</h3>
<div>
  <p class="help-block">Your current e-mail address: <b>{{ $user->email }}</b></p>
</div>
@include('forms.editEmail')

@stop
