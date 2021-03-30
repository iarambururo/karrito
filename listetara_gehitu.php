<?php


session_start();
$l_id=$_GET['l_id'];
$produktua = $_POST['zerrenda_geitu'];
echo $produktua;
echo $l_id;
$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";




 $konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);


$select= mysqli_query($konexioa,"SELECT P_id from produktuak where Izena='$produktua'");
 $res=mysqli_fetch_row($select);
echo "$res[0]";
 $inserta = "INSERT INTO produktu_listak values('$l_id','$res[0]')";

 $exec2 = $konexioa -> query($inserta);
 header('Location: zerrendak_bakoitza.php?l_id='.$l_id);

 ?>
