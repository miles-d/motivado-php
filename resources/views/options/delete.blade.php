@extends('master')

@section('content')
<h3>Delete Account</h3>
<h4 id="delete-warning" class="text-danger">You are going to delete your account. This will permamently delete all your data
from this site.</h4>

<div class="row">
  {!! Form::open(['method' => 'post', 'route' => 'options.delete', 'class' => 'form-horizontal']) !!}
  <button class="btn btn-danger col-lg-2" type="submit">Yes, delete my account</button>
  {!! Form::close() !!}<br>
</div>
<div class="row">
  <a class="btn btn-default col-lg-2" href="{{ route('options.index') }}">No, take me back</a>
</div>
@stop
