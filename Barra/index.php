<!DOCTYPE html>
<html>
<head>
	<title>AJAX</title>
	<!-- Latest compiled and minified CSS -->
	<style>
		.buscador{width: 250px;}
		.search{width: 100%;}
		ul{list-style: none;
			float: left;
			padding: 0px;
			margin-top: 0px;
			color: #4B4B4B;
			border: 1px solid #626262;
			width: 100%;
			border-radius: 0px 0px 0px 0px;}
		li{padding-top: 1.5%;
			padding-bottom: 1.5%;
			padding-left: 2%;}
		li:hover{background: #0088cc;
			color: black;}
		.disabled:hover{background: white;
			color: #4B4B4B;}
	</style>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="buscador">

			<div>
				<input type="text" id="search" class="search" placeholder="Escribe algo..." autocomplete="off">
			</div>

			<div id="response" class="resultado">
				<!--Aqui se printean las opciones que te da el buscador-->
			</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="main.js"></script>
</body>
</html>