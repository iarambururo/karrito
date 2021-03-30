<?php
session_start();
$erabiltzailea=$_SESSION['erabiltzailea'];
$osagaia=($_POST['bilatu']);

$host_db = "10.14.4.159";
 $user_db = "karritoa";
 $pass_db = "Zubiri19";
 $db_name = "karritoa";



 $konexioa = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');

 $select1= mysqli_query($konexioa,"select o_id from osagaiak where izena='$osagaia'");
$res= mysqli_fetch_row($select1);
$a = $res[0];
$inserta= mysqli_query($konexioa,"insert into aukeratutako_produktuak values('$erabiltzailea',$a, '$osagaia')");


header("location: osagaiak.php")


//$insertatu  ="insert into aukeratutako_produktuak   "


 ?>
