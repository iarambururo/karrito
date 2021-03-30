<?php
session_start();

$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";


$konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);

$Erab=strip_tags($_POST['Erab_izena']);
$Izena=strip_tags($_POST['Izena']);
$Abizena=strip_tags($_POST['Abizena']);
$Pasahitza=$_POST['Pasahitza'];
$Telefonoa=strip_tags($_POST['Telefonoa']);
$Korreoa=strip_tags($_POST['Korreoa']);
//pasaitza zifratu egiten da,
$Pasahitza_cifrado=password_hash($Pasahitza, PASSWORD_DEFAULT);

$bilatu=" SELECT * from erabiltzaileak where Erab_izena='$Erab'";

$Erab = $konexioa->real_escape_string($Erab);//Input string-a garbitu. SQL injection ekidin.
$Izena = $konexioa->real_escape_string($Izena);
$Abizena = $konexioa->real_escape_string($Abizena);
$Pasahitza = $konexioa->real_escape_string($Pasahitza);
$Telefonoa = $konexioa->real_escape_string($Telefonoa);
$Korreoa = $konexioa->real_escape_string($Korreoa);

$proba = $konexioa -> query($bilatu);

$zenbatu = mysqli_num_rows($proba);
echo $zenbatu;

if ($zenbatu == 0) {



  $insertatu= "INSERT INTO erabiltzaileak VALUES('$Erab','$Izena','$Abizena','$Pasahitza_cifrado','$Telefonoa','$Korreoa')";

   $proba = $konexioa -> query($insertatu);

echo "$Pasahitza_cifrado";
  //  header('Location: index.html');
  if (password_verify($Pasahitza,$Pasahitza_cifrado)){


    $_SESSION['erabiltzailea']= $_POST['Erab_izena'];
    header('Location: index.php');
    echo "$_SESSION[erabiltzailea]";
}
}



if ($zenbatu == 1) {
  echo'<script type="text/javascript">
   alert("Sartu duzun erabiltzaile izena existitzen da. Mesedez, berriro saiatu!");
   window.location.href="erregistratu.html";
   </script>';

}


 ?>
