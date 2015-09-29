<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Motivado</title>
</head>
<style>
#container {
  max-width: 600px;
  margin: auto;
  font-family: Georgia, Utopia, Charter, serif;
}
#header {
  color: #2780E3;
  width: 100%;
  text-align: center;
  padding-top: 0.5em;
  padding-bottom: 0.5em;
}
.description, .motivation {
  font-weight: bold;
}
.description {
  color: #B5000B;
}
.motivation {
  color: #2780E3;
}
li {
  margin-bottom: 0.5em;
}
footer {
  text-align: center;
  font-size: 0.8em;
  margin-top: 100px;
}
</style>
<body>

<div id="container">

	<h2 id="header"><a href="http://todo.miloszdragan.pl/tasks">MotivaDo</a> reminder</h2>

	@yield('content')

	<footer>
		If you wish to unsubscribe from e-mail notifications, change it in 
		<a href="http://todo.miloszdragan.pl/options">your options</a>.<br>
		If you didn't register on our site, delete this account by clicking <a href="">here</a>.
	</footer>
</div>

</body>
</html>
