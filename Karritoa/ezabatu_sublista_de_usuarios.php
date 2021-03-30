<?php
#Datu Basearen konexioa:
ini_set("session.cookie_lifetime","7200");
session_start();

	$conexion = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');
#Sortutako parametroa "$_GET['']" -ren bidez hartuko dugu:
	$para=$_GET['para'];
	$para2=$_GET['para2'];
	$para3=$_GET['para3'];
	echo $para;
	echo "<br>";

	echo $para2;
#Deletea exekutatu sortu dugun parametroa erabiliz:
	$borratu = mysqli_query($conexion,"DELETE FROM produktu_karritoan
		WHERE K_id='$para' AND P_id='$para2';");
	header('location:sublistas_de_usuarios.php?lista_id='.$para3);
?>
