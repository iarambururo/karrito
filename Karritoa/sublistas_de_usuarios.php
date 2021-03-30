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
	$l_id = $_GET['lista_id'];
	$_SESSION['l_id']=$l_id;
	$l_id_txeto=$_SESSION['l_id'];
	$l_id= $l_id_txeto;
	


		if (isset($_SESSION['erabiltzaile_izena'])){
	#---------------------CONEXION------------------------
		$conexion = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');
	#-----------------------------------------------------
	#-----------------------SQL1--------------------------
		$select = mysqli_query($conexion,"SELECT karritoa.produktuak.Izena,karritoa.produktuak.Prezioa,karritoa.produktu_karritoan.K_id,karritoa.produktu_karritoan.P_id,karritoa.produktu_karritoan.Kantitatea,karritoa.produktu_karritoan.Pre_totala
			FROM karritoa.produktu_karritoan, karritoa.produktuak
			WHERE karritoa.produktu_karritoan.P_id=karritoa.produktuak.P_id and K_id='$_SESSION[erabiltzaile_izena]';");
		$lerroak= mysqli_fetch_row($select);
	#-----------------------------------------------------
	#-----------------------SQL2--------------------------
		$totala = mysqli_query($conexion,"SELECT sum(karritoa.produktu_karritoan.Pre_totala)
			FROM karritoa.produktu_karritoan, karritoa.produktuak
			WHERE karritoa.produktu_karritoan.P_id=karritoa.produktuak.P_id and K_id='$_SESSION[erabiltzaile_izena]';");
		$totalak = mysqli_fetch_row($totala);
	#-----------------------------------------------------
	#---------------------Insertar------------------------
		if (isset($_POST['insertar'])){
			$insert= mysqli_query($conexion,"INSERT INTO produktu_karritoan(K_id,P_id,Kantitatea,Pre_totala)
				VALUES('$_SESSION[erabiltzaile_izena]','$_POST[codigo_de_barras]',1,(SELECT karritoa.produktuak.Prezioa
				FROM karritoa.produktuak
				WHERE karritoa.produktuak.P_id='$_POST[codigo_de_barras]'));");
			$insertar = mysqli_fetch_row($insert);
			header('location:sublistas_de_usuarios.php');
		}
	#-----------------------------------------------------
	#---------------------SQL Listak----------------------
		$sql = mysqli_query($conexion,"SELECT produktuak.Izena, listak.Izena FROM produktuak, produktu_listak, listak
  WHERE produktuak.P_id=produktu_listak.P_id AND produktu_listak.L_id=listak.L_id AND listak.L_id= 1;");
		$listak = mysqli_fetch_row($sql);
	#-----------------------------------------------------

		
		$sql2 = mysqli_query($conexion, "SELECT produktuak.Izena, listak.Izena,produktuak.p_id FROM produktuak, produktu_listak, listak
  WHERE produktuak.P_id=produktu_listak.P_id AND produktu_listak.L_id=listak.L_id AND listak.L_id='$l_id';");
		$sub_listak = mysqli_fetch_row($sql2);
	#--------------------produktuak borratu berdinak daudenean---------------------
	
#	$sql3 = mysqli_query($conexion, "SELECT 
#	pl.p_id FROM produktu_listak pl, produktu_karritoan pk
#WHERE pl.p_id = pk.p_id AND l_id =$_SESSION[l_id] AND k_id ='$_SESSION[erabiltzaile_izena]';");
#		$sub_listak1 = mysqli_fetch_row($sql3);

#		while ($sub_listak1 != ""){
#			echo $sub_listak1[0];
			

#			$borratu = mysqli_query($conexion,"DELETE FROM produktu_listak 
#			WHERE
#				l_id = $_SESSION[l_id] and p_id= $sub_listak1[0];");
#			        $sub_listak1 = mysqli_fetch_row($sql3);
#		}

	#-------------------------------------------------------------------------------

	#---------------------Navegador-----------------------
		echo "<div id='mySidenav' class='sidenav'>";
			echo "<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>";
			echo "<a href='lista.php'>Produktuak</a>";
			echo "<hr class='menu'/>";
			echo "<a href='lista_login.php'>Lista</a>";
			echo "<hr class='menu'/>";
			echo "<a href='errezetak.php'>Errezetak</a>";
			echo "<hr class='menu'/>";
			echo "<a href='ezabatu.php'>Saioa Itxi</a>";
		echo "</div>";
		echo "<span id='rayas' style='font-size:30px;cursor:pointer' onblur='this.focus()' onclick='openNav()'>&#9776;</span>";
	#-----------------------------------------------------
	echo "<div id='borde'>";
		echo "<div id='listas'>";
			echo "<div class='barra'>";
				while($sub_listak != "") {
					echo "<div class='cada_lista'><div class='producto_en_lista'>$sub_listak[0]</div><div class='x_zerrendak'>
								<a class='x_zerrendak x' href='zerrendak_borratu.php?zerrenda=$sub_listak[2]&l_id=$l_id'>X</a></div></div>";
		    		$sub_listak = mysqli_fetch_row($sql2);
		    	}
			echo "</div>";
		echo "</div>";

		echo "<div id='conjunto_prod'>";
			echo "<div class='barra'>";
			while ($lerroak != ""){
				echo "<div id='producto'>";
					echo "<div id='nombre_prod' class='tamaina'>".$lerroak[0]."</div>";
					echo "<div class='cantidad'><a href='eguneratu_sublistas_de_usuarios.php?kendu1=$lerroak[3]&l_id=$l_id'><img src='irudiak/kendu.png' width='23px' height='23px'/></a></div>";
					echo "<div id='cantidad' class='tamaina'>".$lerroak[4]."</div>";
					echo "<div class='cantidad' id='gehitu'><a href='eguneratu_sublistas_de_usuarios.php?batu1=$lerroak[3]&l_id=$l_id'><img src='irudiak/gehitu.png' width='23px' height='23px'/></a></div>";
					echo "<div id='precio'  class='tamaina'>".$lerroak[5]."&#8364</div>";
					echo "<div id='borrar'><a href='ezabatu_sublista_de_usuarios.php?para=$lerroak[2]&para2=$lerroak[3]&para3=$l_id'><img src='irudiak/zaborra1.png' width='25px' height='25px'/></a></div>";
				echo "</div>";
				$lerroak = mysqli_fetch_row($select);}
			echo "</div>";
		echo "</div>";
		echo "<div id='abajo'>";
			echo "<div id='codigo_de_barras'><form action='sublistas_de_usuarios_trampa.php' method='POST'>
					<input type='text' name='codigo_de_barras' autocomplete='off' onblur='this.focus()' autofocus/>
					<input type='submit' name='insertar' value='Txertatu' hidden/>
				</form></div>";
			echo "<div id='logo'>
				<div id='ioi'><p id='ioi_nombre'>IOI Technology</p></div>
					<form action='sublistas_de_usuarios.php' method='POST'>
						<div id='dena_borratu'><a href='dena_borratu_sublista_de_usuarios.php?para=$lerroak[2]&para2=$lerroak[3]&l_id=$l_id'><img src='irudiak/refresh.png' width='30px' height='30px'/></a></div>
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
