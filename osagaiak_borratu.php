<?php

session_start();

$osagaia = $_GET["osagaia"];


$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";
$tbl_name = "erabiltzaileak";

 //Konexioa egin 
 $konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);

$select = "DELETE FROM aukeratutako_produktuak WHERE erab_izena='$_SESSION[erabiltzailea]' AND izena='$osagaia'";

$proba = $konexioa -> query($select);
header('Location: osagaiak.php'); 

?>