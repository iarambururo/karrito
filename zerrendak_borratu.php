<?php

session_start();

$zerrenda = $_GET["zerrenda"];


$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";
$tbl_name = "erabiltzaileak";

 //Konexioa egin 
 $konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);

$select = "DELETE FROM listak WHERE listak.L_id='$zerrenda'";

$proba = $konexioa -> query($select);
header('Location: zerrendak.php?'); 

?>