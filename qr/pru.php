<?php 
$dato = $_GET['k_id'];

echo $dato;


$host_db = "10.14.4.159";
 $user_db = "karritoa";
 $pass_db = "Zubiri19";
 $db_name = "karritoa";
 $tbl_name = "karritoak";

$conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);

$insert= mysqli_query($conexion,"UPDATE karritoa SET Erab_izena = 'kk' WHERE k_id=22191005");


?>