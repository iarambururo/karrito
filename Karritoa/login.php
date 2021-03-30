

<?php
ini_set("session.cookie_lifetime","7200");
session_start();

$host_db = "10.14.4.159";
 $user_db = "karritoa";
 $pass_db = "Zubiri19";
 $db_name = "karritoa";
 $tbl_name = "karritoak";

 echo $_SESSION['erabiltzaile_izena'];

   //Konexioa burutu:

	   $conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);
#	   if(isset($_POST['Sartu'])){
#
 #   $select = mysqli_query($conexion,"INSERT INTO karritoak  VALUES(2, 0, null);");


	$inserta = mysqli_query($conexion, "INSERT INTO karritoak (K_id, erab_izena) VALUES ('$_SESSION[erabiltzaile_izena]',  null );");
				#$emaitza = mysqli_query($konexioa,$insert);




   # $buscar_usuario = $conexion -> query($select);


    //$kontatu = mysqli_num_rows($buscar_usuario);
//echo "hola"
//	if ($kontatu == 1){
//	    session_start();
//	$_SESSION['erabiltzaile_izena']= $_POST[usuario];
	    header('Location: lista.php');
//	}else{
		//echo "hola"
	//	header('Location: index.html');
//	}








?>
