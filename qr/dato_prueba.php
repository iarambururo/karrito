<?php


session_start();



//if(!isset($_GET["v"])) die("");


$dato=$_GET["v"];

$erabiltzailea = $_SESSION['erabiltzaile_izena'];

//aqui grabamos en el mysql


$host_db = "10.14.4.159";
 $user_db = "karritoa";
 $pass_db = "Zubiri19";
 $db_name = "karritoa";
 $tbl_name = "karritoak";


/*
   $conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);
   $sql = "UPDATE karritoak SET Erab_izena = '$erabiltzailea' WHERE k_id='$dato'; ";
   
   //$sql = 'INSERT INTO qr(id) VALUES("'.$dato.'")';
	$resultado= @$conexion -> query("UPDATE karritoak SET Erab_izena = 'kk' WHERE k_id=$dato;");
*/




$conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);

$insert= mysqli_query($conexion,"UPDATE karritoa SET Erab_izena = 'kk' WHERE k_id=85824572");





?>


<P>Tus productos apareceran en el carro</P>
<P>DATOS LEIDOS:</P>
<img src="cam.png"/>
<HR>
<?php echo "<b>$dato</b>"; 

//header('location:pru.php?k_id='.$dato);


?>
<HR>
<br>
<br>
<form>
<input value="ESCANEAR OTRO" onclick="history.go(0)" type="button">
</form>