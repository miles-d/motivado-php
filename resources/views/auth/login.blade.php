@extends('master')
@section('content')
<div class="page-header">
  <h1>Log In</h1>
</div>
<div>
  <div class="row">
    <div class="col-lg-6">
      <div class="well" id="login_form">
        @include('forms.login')
      </div>
    </div>
    <div id="about" class="col-lg-3 col-lg-offset-1">
      <h4>
        <b>Motivado</b> helps you in completing your tasks by requiring you to define
        the motivation for it.  Then, it reminds you why you decided to put the
        taks on your list - and thus helping you to get it done.
      </h4>
    </div>
  </div>
</div>

@stop
