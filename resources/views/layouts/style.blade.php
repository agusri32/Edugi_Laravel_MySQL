<!DOCTYPE html>

<style type="text/css"> 
	@media print{ #not-print { display: none; } } 
</style>

<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>
<body>
	<br>
	<h1 id="not-print"><center>EDUGI LARAVEL MYSQL</center></h1><br>
	<div class="container">
		@yield('content')
	</div>  
</body>
</html>

 <!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@stack('scripts')