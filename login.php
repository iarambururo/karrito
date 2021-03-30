<?php
session_start();

$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";
$tbl_name = "erabiltzaileak";


$Pasahitza = $_POST['Pasahitza'];

 //Konexioa egin
 $konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);
 $select = "SELECT Pasahitza FROM $tbl_name where Erab_izena = '$_POST[Erab_izena]'";

 $select2= mysqli_query($konexioa,"$select");
 $res2= mysqli_fetch_row($select2);
// hemen pasahitza komprobatzen da. koinsiditzen badu true ematen du.
if (password_verify($Pasahitza,$res2[0])){

    session_start();
	  $_SESSION['erabiltzailea']= $_POST['Erab_izena'];
	  header('Location: index.php');

}
	 else{
	 echo'<script type="text/javascript">
    alert("Sartu duzun erabiltzaile izena edo pasahitza ez da zuzena. Mesedez, berriro saiatu!");
    window.location.href="login.html";
    </script>';
  }
?>
