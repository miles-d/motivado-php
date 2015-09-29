@extends('master')
@section('content')
<div class="col-sm-offset-2">
    <h1>Create Account</h1>
	<br>
</div>
<div id="signup_form">
  <div class="row">
    <div class="col-lg-6">
      <div class="well">
      @include('forms.register')
      </div>
    </div>
  </div>
</div>
@stop

