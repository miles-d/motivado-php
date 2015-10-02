<!DOCTYPE html>
<html>
<head>
    <title>MotivaDo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css"> 
    <link type="text/css" rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/flick/jquery-ui.css"> 
</head>
<body>
<div id="wrap">
  <div class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('tasks.index') }}">MotivaDo</a>
      </div>
      <div class="navbar-default" id="navbar-main">
        <ul class="navbar navbar-nav navbar-right">
          <ul class="nav navbar-nav navbar-right">
          @if(isset($user))
            <li><a href="{{ route('options.index') }}">Options</a></li>
            <li><a href="{{ route('auth.logout') }}">Log Out {{ $user->email }}</a></li>
          @else
            <li><a href="{{ route('auth.showRegister') }}">Create Account</a></li>
            <li><a href="{{ route('auth.showLogin') }}">Log In</a></li>
          @endif
          </ul>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    @include('partials._flash')
    @yield('content')
  </div>
</div>
<footer class="footer">
	<h6 class="text-center">
		2015 Miles Dragan | <a href="mailto:miloszdragan@openmailbox.org">miloszdragan@openmailbox.org</a>
	</h6>
</footer>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
<script src="/js/script.js"></script>
</body>
</html>
