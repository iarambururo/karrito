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
		$select= mysqli_query($conexion,"SELECT karritoa.produktuak.Izena,karritoa.produktuak.Prezioa,karritoa.produktu_karritoan.K_id,karritoa.produktu_karritoan.P_id,karritoa.produktu_karritoan.Kantitatea,karritoa.produktu_karritoan.Pre_totala
			FROM karritoa.produktu_karritoan, karritoa.produktuak
			WHERE karritoa.produktu_karritoan.P_id=karritoa.produktuak.P_id and K_id='$_SESSION[erabiltzaile_izena]';");
		$lerroak= mysqli_fetch_row($select);
	#-----------------------------------------------------
	#-----------------------SQL2--------------------------
		$totala= mysqli_query($conexion,"SELECT sum(karritoa.produktu_karritoan.Pre_totala)
			FROM karritoa.produktu_karritoan, karritoa.produktuak
			WHERE karritoa.produktu_karritoan.P_id=karritoa.produktuak.P_id and K_id='$_SESSION[erabiltzaile_izena]';");
		$totalak= mysqli_fetch_row($totala);
	#-----------------------------------------------------
	#---------------------Insertar------------------------
		if (isset($_POST['insertar'])){
			$insert= mysqli_query($conexion,"INSERT INTO produktu_karritoan(K_id,P_id,Kantitatea,Pre_totala)
				VALUES('$_SESSION[erabiltzaile_izena]','$_POST[codigo_de_barras]',1,(SELECT karritoa.produktuak.Prezioa
				FROM karritoa.produktuak
				WHERE karritoa.produktuak.P_id='$_POST[codigo_de_barras]'));");
			$insertar= mysqli_fetch_row($insert);
			header('location:lista.php');
		}
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
				while($listak != "") {
					// echo "<div id='listas'><a href='zerrendak_bakoitza.php?izena=$fila[0]&l_id=$fila[1]'> $fila[0]</a></div>";
					echo "<div class='no_margen'><a href='sublistas_de_usuarios.php?lista_id=$listak[1]'><div class='margen'>".$listak[0]."</div></a></div>";
		    		$listak= mysqli_fetch_row($sql);
		    	}
			echo "</div>";
		echo "</div>";
	echo "</div>";
	}

	?>
</body>
</html>

<!--if(!("autofocus" in document.createElement("input")))
  document.getElementById("nombre").focus();-->
