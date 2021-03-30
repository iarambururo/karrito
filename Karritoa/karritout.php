<?php
ini_set("session.cookie_lifetime","7200");
session_start();
$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";
$tbl_name = "erabiltzaileak";


$erabiltzailea = $_SESSION['erabiltzaile_izena'];

$konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);

$delete= mysqli_query($konexioa,"DELETE from produktu_karritoan where K_id= '$erabiltzailea' ;");
$delete2= mysqli_query($konexioa,"DELETE from karritoak where K_id='$erabiltzailea'  ;");

header('location:index.php');










?>
