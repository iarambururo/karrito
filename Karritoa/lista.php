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
					echo "<div class='cantidad'><a href='eguneratu.php?kendu1=$lerroak[3]'><img src='irudiak/kendu.png' width='25px' height='25px'/></a></div>";
					echo "<div id='cantidad' class='tamaina'>".$lerroak[4]."</div>";
					echo "<div class='cantidad' id='gehitu'><a href='eguneratu.php?batu1=$lerroak[3]'><img src='irudiak/gehitu.png' width='25px' height='25px'/></a></div>";
					echo "<div id='precio'  class='tamaina'>".$lerroak[5]."&#8364</div>";
					echo "<div id='borrar'><a href='ezabatu.php?para=$lerroak[2]&para2=$lerroak[3]'><img src='irudiak/zaborra1.png' width='30px' height='30px'/></a></div>";
				echo "</div>";
				$lerroak = mysqli_fetch_row($select);
			}
			echo "</div>";
		echo "</div>";
		echo "<div id='abajo'>";
			echo "<div id='codigo_de_barras'><form action='lista.php' method='POST'>
					<input type='text' name='codigo_de_barras' autocomplete='off' onblur='this.focus()' autofocus/>
					<input type='submit' name='insertar' value='Txertatu' hidden/>
				</form></div>";
			echo "<div id='logo'>
				<div id='ioi'><p id='ioi_nombre'>IOI Technology</p></div>
					<form action='lista.php' method='POST'>
						<div id='dena_borratu'><a href='dena_borratu.php?para=$lerroak[2]&para2=$lerroak[3]'><img src='irudiak/refresh.png' width='30px' height='30px'/></a></div>
					</form>
				</div>";
			echo "<div id='total'><p id='total_nombre'>Totala: ".$totalak[0]."&#8364</p></div>";
		echo "</div>";
	echo "</div>";
	}
	?>
</body>
</html>

<!--if(!("autofocus" in document.createElement("input")))
  document.getElementById("nombre").focus();-->
