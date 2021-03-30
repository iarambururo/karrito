<?php
session_start();
$l_id = ($_GET["l_id"]);
$produktua = ($_GET["produktua"]);



$zerrenda = $_GET["zerrenda"];


$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";
$tbl_name = "erabiltzaileak";

 //Konexioa egin 
 $konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);

$select = "DELETE from karritoa.produktu_listak  where L_id='$l_id' and p_id='$produktua';";

$proba = $konexioa -> query($select);
header('Location: zerrendak_bakoitza.php?l_id='.$l_id) 

?>
?>