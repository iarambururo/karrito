<!DOCTYPE html>
<html>
<head>
	<title>IOI Technology</title>
	<link rel="stylesheet" type="text/css" href="estiloak_lista.css">
</head>
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
<body>
	<?php
	ini_set("session.cookie_lifetime","7200");
	session_start();
	if (isset($_SESSION['erabiltzaile_izena'])){
	z
	#-----------------------------------------------------
#---------------------------sql erabiltzailea lortzeko------------------------
$erabiltzailea_lortzeko=mysqli_query($conexion, "SELECT Erab_izena FROM karritoa.karritoak where K_id='$_SESSION[erabiltzaile_izena]'");

		$Erab_izena= mysqli_fetch_row($erabiltzailea_lortzeko);



#--------------------------------------------------------------------------
	#---------------------SQL Listak----------------------
		$sql=mysqli_query($conexion, "SELECT listak.Izena, listak.L_id FROM listak_erabiltzaileak, listak

							WHERE listak.L_id=listak_erabiltzaileak.L_id AND listak_erabiltzaileak.Erab_izena='$Erab_izena[0]'
							ORDER BY listak.L_id desc");

		$listak= mysqli_fetch_row($sql);
	#-----------------------------------------------------
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
		echo "<div id='borde2'>";
			echo "<div id='listas_usuarios'>";
			echo "<div class='barra2'>";

			echo "</div>";
		echo "</div>";
	echo "</div>";
	}

	?>

	<script type="text/javascript">


<?php

$dato=$_SESSION['erabiltzaile_izena'];
echo(" document.getElementById(\"qrimage\").innerHTML=\"<img src=\'https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=$dato\'>\";  ");
?>

</script>
</body>
</html>

<!--if(!("autofocus" in document.createElement("input")))
  document.getElementById("nombre").focus();-->
