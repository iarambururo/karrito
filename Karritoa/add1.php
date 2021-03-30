<?php
ini_set("session.cookie_lifetime","7200");
session_start();
//$_SESSION[erabiltzaile_izena]
$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";
$tbl_name = "erabiltzaileak";
$konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);

$select4= mysqli_query($konexioa,"SELECT erab_izena FROM karritoa.karritoak where k_id='$_SESSION[erabiltzaile_izena]' ");
$res4= mysqli_fetch_row($select4);

if ($res4[0] == null) {
//echo"esta vacio";


}
else{
//    esto apareze en el carro
echo "tenemos datos";
echo "<script>";
echo "window.location.href = 'listas_de_usuarios.php'";
echo "</script>";


}



?>
