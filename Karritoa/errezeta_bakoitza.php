<!DOCTYPE html>
<html>
<head>
	<title>IOI Technology</title>
	<link rel="stylesheet" type="text/css" href="estiloak.css">
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

	$errezeta_izena = $_GET['izena'];
	if (isset($_SESSION['erabiltzaile_izena'])){
	#---------------------CONEXION------------------------
		$conexion = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');
	#-----------------------------------------------------
	#-----------------------SQL1--------------------------
		$select= mysqli_query($conexion,"SELECT osagaiak.izena, errezetak.izena FROM karritoa.errezetak, errezetak_osagaiak, osagaiak where errezetak.izena='$errezeta_izena' and errezetak_osagaiak.E_id=errezetak.E_id and errezetak_osagaiak.o_id=osagaiak.o_id;");
		$lerroak= mysqli_fetch_row($select);
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
	echo "<div id='borde'>";
		echo "<div id='conjunto_prod'>";
			echo "<div class='barra'>";
			while ($lerroak != ""){
				echo "<div id='producto'>";
					echo "<div id='nombre_prod' class='tamaina'>".$lerroak[0]."</div>";

				echo "</div>";
				$lerroak = mysqli_fetch_row($select);
			}
			echo "</div>";
		echo "</div>";
		echo "<div id='abajo2' class='e_izena'
			<p>".$errezeta_izena."</p>";
		echo "</div>";
		echo "<a href='errezetak.php'>Itzuli</a>";
	echo "</div>";
	}
	return "esta lista";
	?>
</body>
</html>
