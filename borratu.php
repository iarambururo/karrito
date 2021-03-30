<?php
session_start();
$erabiltzailea=$_SESSION['erabiltzailea'];


$host_db = "10.14.4.159";
 $user_db = "karritoa";
 $pass_db = "Zubiri19";
 $db_name = "karritoa";



 $konexioa = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');

$sql= mysqli_query($konexioa,"delete from aukeratutako_produktuak where erab_izena='$erabiltzailea'");




 header("location:osagaiak.php");






?>
