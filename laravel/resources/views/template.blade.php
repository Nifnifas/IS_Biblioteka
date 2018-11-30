<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Bibliotekos informacinė sistema')</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
		<div class="container">
			<a href="{{ url('/') }}"><h2>Bibliotekos informacinė sistema</h2></a>
			<a href="{{ url('book-list') }}">Knygų sąrašas</a>
			<a href="{{ url('/') }}">Sąrašas</a>
			<a href="{{ url('/') }}">Sąrašas</a>
			<a href="{{ url('/') }}">Sąrašas</a>
		</div>
		<hr/>
		<div class="container">
			@yield('content')
		</div>
    </body>
</html>
