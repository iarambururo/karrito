<?php

session_start();

$p_id = $_GET["p_id"];
$l_id = ($_GET["l_id"]);


$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";
$tbl_name = "erabiltzaileak";

 //Konexioa egin 
 $konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);

$select = "DELETE FROM produktu_listak WHERE L_id=$l_id AND P_id=$p_id ;";

$proba = $konexioa -> query($select);
$_SESSION['l_id']=$l_id;
header('Location: zerrendak_bakoitza.php?l_id='.$l_id)

?>