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
	#---------------------CONEXION------------------------
		$conexion = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');
	#-----------------------------------------------------
	#-----------------------SQL1--------------------------
		$select= mysqli_query($conexion,"SELECT karritoa.errezetak.Izena
			FROM karritoa.errezetak
			 ;");
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
	echo "<div id='borde2'>";
			echo "<div id='listas_usuarios'>";
			echo "<div class='barra2'>";
		    	while ($lerroak != ""){
					echo "<div class='no_margen'><a href='errezeta_bakoitza.php?izena=$lerroak[0]'><div class='margen'>".$lerroak[0]."</div></a></div>";
				$lerroak = mysqli_fetch_row($select);
			}
			echo "</div>";
		echo "</div>";
		
	echo "</div>";
	}

	?>
</body>
</html>


