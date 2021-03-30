<!DOCTYPE html>
<html>
<head>
	<title>IOI Technology</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ejecutar una función cada x segundos con jQuery Demo</title>
<meta name="description" content="Cada 3 segundos se va a cambiar de color el fondo de esta Web."/>
<meta name="author" content="Jose Aguilar">
<link rel="shortcut icon" href="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/favicon.ico" />
<link rel="stylesheet" type="text/css" href="estiloak_lista.css">

<!-- Latest compiled and minified CSS -->

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<style>
	@font-face{font-family: "IOI";
		src: url("letra/AppleGaramond.ttf");}
	body{background-color: while;
		font-family: IOI;}
	a{font-family: IOI;}
	#borde{background-color: #D6D6D6;
		width: 99%;
		height: 450px;
		padding-bottom: 0.5%;
		border: 5px;
		border-style: outset;}

		#conjunto_prod{width: 100%;
			height: 365px;
			overflow-y: auto;}
			#producto{background-color: white;
				border: 2px solid #919191;
				margin-top: 1.5%;
				margin-left: 10%;
				width: 85%;
				height: 90px;}
				.tamaina{margin-top: 25px;
					font-size: 35px;}


	/*-------------Menu lateral de navegacion-------------*/
		#mySidenav{position: absolute;
			top: 2.45%;
			left: 1.50%;}
		#rayas{position: absolute;
			left: 4%;
			top: 10%;}
		.sidenav {
		    height: 395px;
		    width: 0;
		    position: fixed;
		    z-index: 1;
		    top: 0;
		    left: 0;
		    background-color: #111;
		    overflow-x: hidden;
		    transition: 0.5s;
		    padding-top: 60px;}
		.sidenav a {
		    padding: 8px 8px 8px 32px;
		    text-decoration: none;
		    font-size: 25px;
		    color: #818181;
		    display: block;
		    transition: 0.3s;}
		.sidenav a:hover {
		    color: #f1f1f1;}
		.sidenav .closebtn {
		    position: absolute;
		    top: 0;
		    right: 25px;
		    font-size: 36px;
		    margin-left: 50px;}
			@media screen and (max-height: 450px) {
			  .sidenav {padding-top: 15px;}
			  .sidenav a {font-size: 18px;}}
	/*----------------------------------------------------*/

/*--------------------qr sorrera---------------------------------*/
#qrimage{
	position:absolute;
	left:40%;
	top:20%;
}
/*--------------------------------------------------------*/
</style>
<script type="text/javascript">
	document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<script>
		function openNav() {
		    document.getElementById("mySidenav").style.width = "97.2%";
		}

		function closeNav() {
		    document.getElementById("mySidenav").style.width = "0";
		}
</script>



<script type="text/javascript">
$(document).ready(function() {
    function changeNumber() {
        value = $('#value').text();
        $.ajax({
            type: "POST",
            url: "add1.php",
            success: function(data) {
                $('#value').html(data);

            }
        });
    }
    setInterval(changeNumber, 1000);
});
</script>


<body>
	<?php
	ini_set("session.cookie_lifetime","7200");
	session_start();

	#---------------------CONEXION------------------------
		$conexion = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');
	#-----------------------------------------------------

	#-------------------------SI TE LOGEAS----------------
	$totala= mysqli_query($conexion,"SELECT erab_izena FROM karritoa.karritoak WHERE K_id='$_SESSION[erabiltzaile_izena]';");
		$totalak= mysqli_fetch_row($totala);

		if($totalak[0] == null){
		//	echo "si";
		}
		else{
			header('Location: listas_de_usuarios.php');

		}

	#---------------------Navegador-----------------------
	echo "<div id='mySidenav' class='sidenav'>";
	echo "<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>";
	echo "<a href='lista.php'>Produktuak</a>";
	echo "<hr class='menu'/>";
	echo "<a href='lista_login.php'>Lista</a>";
	echo "<hr class='menu'/>";
	echo "<a href='errezetak.php'>Errezetak</a>";
	echo "<hr class='menu'/>";
	echo "<a href='karritout.php'>Saioa Itxi</a>";
echo "</div>";
echo "<span id='rayas' style='font-size:30px;cursor:pointer' onblur='this.focus()' onclick='openNav()'>&#9776;</span>";
#-----------------------------------------------------
	echo "<div id='borde'>";
		echo "<div id='conjunto_prod'>";

	?>
	  <div id="content" class="col-lg-12">
            <span id="value"></span>
		</div>
		<div id="qrimage"><img src="irudiak/Logo.PNG" alt="Logo"></div>

	<div id="qrimage2"></div>






<script type="text/javascript">


<?php

$dato=$_SESSION['erabiltzaile_izena'];
echo(" document.getElementById(\"qrimage\").innerHTML=\"<img src=\'https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=$dato\'>\";  ");
?>

</script>










</body>
</html>
