<!DOCTYPE html>
<html>
<head>
	<title>IOI Technology</title>
</head>
<style>
	body{background-color: red;}
	#borde{background-color: #D6D6D6;
		width: 99%;
		height: 549px;
		padding-bottom: 0.2%;
		border: 5px;
		border-style: outset;}
		#conjunto_prod{width: 100%;
			height: 460px;
			overflow-y: auto;}
			#producto{background-color: white;
				border: 2px solid #919191;
				margin: 0 auto;
				margin-top: 1.5%;
				width: 85%;
				height: 90px;}
				p{font-size: 30px;}
			#nombre_prod{width: 50%;
				display: inline-block;
				margin-left: 1.5%;}
			.cantidad{
				text-align: center;
				width: 15px;
				height: 15px;
				margin-right: 2%;
				margin-left: 1.5%;
				display: inline-block;}
			#cantidad{display: inline-block;}
			#precio{width: 20%;
				margin-left: 1.5%;
				display: inline-block;}
			#borrar{text-align: center;
				width: 21px;
				height: 21px;
				margin-left: 3.5%;
				display: inline-block;}
		#abajo{background-color: #D6D6D6;
			margin-top: 1.5%;
			width: 100%;
			height: 70px;
			text-align: center;}
			#logo{background-color: #D6D6D6;
				position: absolute;
				width: 50%;
				height: 70px;}
			#codigo_de_barras{background-color: #D6D6D6;
				width: 58.5%;
				height: 100%;
				float: left;}
				input{margin-top: 30px;}
			#dena_borratu{position: absolute;
				bottom: 35px;
				left: 350px;
				height: 33px;
				width: 33px;
				}
			#total{background-color: yellow;
				border: 2px solid black;
				width: 40%;
				height: 100%;
				float: left;}
				h1{margin-top: 20px;}
	/*-------------Menu lateral de navegacion-------------*/
		#mySidenav{
			position: absolute;
			top: 1.4%;
			left: 0.8%;}
		#rayas{position: absolute;
			left: 3%;
			top: 5%;
			margin-right: 200px;}
		.sidenav {
		    height: 504px;
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
</style>
<script type="text/javascript">
	var x=1;
	function gehitu(){
		x=x+1
		document.getElementById("cantidad").innerHTML=x;
		}
</script>
<script>
		function openNav() {
		    document.getElementById("mySidenav").style.width = "250px";
		}

		function closeNav() {
		    document.getElementById("mySidenav").style.width = "0";
		}
</script>
<body>
	<?php
	session_start();
	if (isset($_SESSION['erabiltzaile_izena'])){
	#---------------------CONEXION------------------------
		$conexion = mysqli_connect('10.14.4.159', 'Ian', 'Zubiri19', 'karritoa');
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
			header('location:index.php');
		}
	#-----------------------------------------------------
	#---------------------Navegador-----------------------
		echo "<div id='mySidenav' class='sidenav'>";
			echo "<a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>";
			echo "<a href='#'>Lista</a>";
			echo "<a href='#'>Errezetak</a>";
		echo "</div>";
		echo "<span id='rayas' style='font-size:30px;cursor:pointer' onblur='this.focus()' onclick='openNav()'>&#9776;</span>";
	#-----------------------------------------------------
	echo "<div id='borde'>";
		echo "<div id='conjunto_prod'>";
			while ($lerroak != ""){
				echo "<div id='producto'>";
					echo "<div id='nombre_prod'><p>".$lerroak[0]."</p></div>";
					echo "<div class='cantidad'><a href='eguneratu.php?kendu1=$lerroak[3]'><img src='irudiak/kendu.png' width='20px' height='20px'/></a></div>";
					echo "<div id='cantidad'><p>".$lerroak[4]."</p></div>";
					echo "<div class='cantidad' id='gehitu'><a href='eguneratu.php?batu1=$lerroak[3]'><img src='irudiak/gehitu.png' width='20px' height='20px'/></a></div>";
					echo "<div id='precio'><p>".$lerroak[5]."&#8364</p></div>";
					echo "<div id='borrar'><a href='ezabatu.php?para=$lerroak[2]&para2=$lerroak[3]'><img src='irudiak/zaborra1.png' width='25px' height='25px'/></a></div>";
				echo "</div>";
				$lerroak = mysqli_fetch_row($select);}
		echo "</div>";
		echo "<div id='abajo'>";
			echo "<div id='codigo_de_barras'>
				<form action='index.php' method='POST'>
				<div id='dena_borratu'><a href='dena_borratu.php?para=$lerroak[2]&para2=$lerroak[3]'><img src='irudiak/refresh.png' width='30px' height='30px'/></a></div>
				<input type='text' name='codigo_de_barras' onblur='this.focus()' autofocus/>
				<input type='submit' name='insertar' value='Txertatu' hidden/>
				</form></div>";
			echo "<div id='logo'></div>";
			echo "<div id='total'><h1>Totala: ".$totalak[0]."&#8364</h1></div>";
		echo "</div>";
	echo "</div>";
	}
	?>
</body>
</html>

<!--if(!("autofocus" in document.createElement("input")))
  document.getElementById("nombre").focus();-->