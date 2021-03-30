<?php
ini_set("session.cookie_lifetime","7200");
session_start();
if (isset($_SESSION['erabiltzaile_izena']))
{
#Datu Basearen konexioa:
	$conexion = mysqli_connect('10.14.4.159', 'Ian', 'Zubiri19', 'karritoa');
#Sortutako parametroa "$_GET['']" -ren bidez hartuko dugu:
	$para=$_GET['para'];
	$para2=$_GET['para2'];
#Deletea exekutatu sortu dugun parametroa erabiliz:
	$borratu = mysqli_query($conexion,"DELETE FROM produktu_karritoan WHERE K_id='$_SESSION[erabiltzaile_izena]';");
	$l_id = $_GET['l_id'];
	header('location:sublistas_de_usuarios.php?lista_id='.$l_id);}
?>
