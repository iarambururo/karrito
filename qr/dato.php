<?php
error_reporting(0);

session_start();



//if(!isset($_GET["v"])) die("");


$dato=$_GET["v"];

$erabiltzailea=$_SESSION['erabiltzailea'];

//aqui grabamos en el mysql


$host_db = "10.14.4.159";
 $user_db = "karritoa";
 $pass_db = "Zubiri19";
 $db_name = "karritoa";
 $tbl_name = "karritoak";



   $conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);
   $sql = "UPDATE karritoak SET Erab_izena = '".$_SESSION['erabiltzailea']."' WHERE k_id='".$dato."' ";
   //$sql ="SELECT k_id from karritoak where k_id=22191005;";

   
   //$sql = 'INSERT INTO qr(id) VALUES("'.$dato.'")';
	$resultado= @$conexion -> query($sql);

  //$fila = $resultado->fetch_array();

//echo $fila[0];







?>





<HR>
<?php
error_reporting(0);
///////////////////////////////detectando errores/////////////////////////////////////////////////////////////////////////
$select4= mysqli_query($conexion,"SELECT erab_izena FROM karritoa.karritoak where k_id='$dato' and Erab_izena='$erabiltzailea'   ");
$res4= mysqli_fetch_row($select4);

if ($res4[0] == null) {
echo"<P>QR-a irakurtzean zerbait gaizki joan da.</P>";
echo "<img src='x.png'/>";

}
else{
//esto apareze en el carro
echo "<P>Zure listak karritoan agertuko dira.</P>";
echo "<img src='cam.png'/>";


}

//echo "<b>".$erabiltzailea."</b>"; 

?>

<HR>
<br>
<br>
<form>
<input value="ESCANEAR OTRO" class="btn btn-primary" onclick="history.go(0)" type="button">
</form>