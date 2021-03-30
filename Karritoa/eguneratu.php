<?php
ini_set("session.cookie_lifetime","7200");
	session_start();
	if (isset($_SESSION['erabiltzaile_izena'])){
#Datu Basearen konexioa:
	$conexion = mysqli_connect('10.14.4.159', 'Ian', 'Zubiri19', 'karritoa');
#Sortutako parametroa "$_GET['']" -ren bidez GEHIKETA egingo dugu:

	$batu1=$_GET['batu1'];
	#Updatea exekutatu sortu dugun parametroa erabiliz:
		$gehiketa1=mysqli_query($conexion,"UPDATE produktu_karritoan
			SET Kantitatea=Kantitatea + 1
			WHERE P_id='$batu1' AND K_id='$_SESSION[erabiltzaile_izena]';");
		header('location:index.php');
		$gehiketa2=mysqli_query($conexion,"UPDATE karritoa.produktu_karritoan
			INNER JOIN karritoa.produktuak
			ON karritoa.produktu_karritoan.P_id=karritoa.produktuak.P_id
			SET karritoa.produktu_karritoan.Pre_totala=karritoa.produktuak.Prezioa*karritoa.produktu_karritoan.Kantitatea
			WHERE karritoa.produktu_karritoan.P_id='$batu1' AND K_id='$_SESSION[erabiltzaile_izena]';");
		header('location:lista.php');

#Sortutako parametroa "$_GET['']" -ren bidez KENKETA egingo dugu:
	$kendu1=$_GET['kendu1'];
	#Updatea exekutatu sortu dugun parametroa erabiliz:
		$kenketa1=mysqli_query($conexion,"UPDATE produktu_karritoan
			SET Kantitatea=Kantitatea - 1
			WHERE P_id='$kendu1' AND K_id='$_SESSION[erabiltzaile_izena]';");
		header('location:lista.php');
		$kenketa2=mysqli_query($conexion,"UPDATE karritoa.produktu_karritoan
			INNER JOIN karritoa.produktuak
			ON karritoa.produktu_karritoan.P_id=karritoa.produktuak.P_id
			SET karritoa.produktu_karritoan.Pre_totala=karritoa.produktu_karritoan.Pre_totala-karritoa.produktuak.Prezioa
			WHERE karritoa.produktu_karritoan.P_id='$kendu1' AND K_id='$_SESSION[erabiltzaile_izena]';");
		header('location:lista.php');
	}
?>
