<?php
session_start();

$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";
$tbl_name = "erabiltzaileak";


$erabiltzailea = $_SESSION["erabiltzailea"];

$Pasahitza = $_POST['Pasahitza'];
$Pasahitz_berria = $_POST['Pasahitz_berria'];
$Pasahitza_borratzeko= $_POST['Pasahitza_borratzeko'];
 //Konexioa egin
 $konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);

 ///////////////////////////////////////////////////////////////////////////////
 if (isset($_POST['pazahitza_aldatu'])){

 $select = "SELECT Pasahitza FROM $tbl_name where Erab_izena = '$erabiltzailea'";

 $select2= mysqli_query($konexioa,"$select");
 $res2= mysqli_fetch_row($select2);
// hemen pasahitza komprobatzen da. koinsiditzen badu true ematen du.
if (password_verify($Pasahitza,$res2[0])){

    $Pasahitza_encriptatua=password_hash($Pasahitz_berria,PASSWORD_DEFAULT);


    $conexion = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');



    $update="UPDATE erabiltzaileak SET Pasahitza = '$Pasahitza_encriptatua' WHERE Erab_izena='$erabiltzailea'";

    $select3= mysqli_query($conexion,"$update");
    $res4= mysqli_fetch_row($select3);
    header('Location: erabiltzailea.php');

}

else{

  echo "<script>alert('Pasahitz zaharra gaizki jarri duzu!'); location.href='erabiltzailea.php';</script>";
}
 }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
// if (isset($_POST['kontua_borratu'])){
//     echo "le diste boludo";
//
//     $conexion = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');
//
//     $select9 = "SELECT Pasahitza FROM $tbl_name where Erab_izena = '$erabiltzailea'";
//
//     $select9= mysqli_query($konexioa,"$select9");
//     $res9= mysqli_fetch_row($select9);
//
//     if (password_verify($Pasahitza_borratzeko,$res9[0])){

//Konexioa egin


				//	 $select10=mysqli_query($conexioa,"DELETE FROM erabiltzaileak WHERE Erab_izena='$erabiltzailea'");


					 //echo $res[0];



//     header('Location: index.php');
//
// }
//}

?>
