

<?php
session_start();

$host_db = "10.14.4.159";
 $user_db = "Ian";
 $pass_db = "Zubiri19";
 $db_name = "karritoa";
 $tbl_name = "karritoak";

$form_pass = $_POST['Pasahitza'];

// https://www.youtube.com/watch?v=oBxlfSDF7A4

   //konexioa egin 

   $conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);

    $select = "SELECT * FROM $tbl_name where K_id = '$_POST[usuario]' ";

    $buscar_usuario = $conexion -> query($select);

    $kontatu = mysqli_num_rows($buscar_usuario);

if ($kontatu == 1){
    session_start();
$_SESSION['erabiltzaile_izena']= $_POST[usuario];
    
    header('Location: index.php');
    

}
else{
    echo "Zerbait gaizki dago edo ez zaude erregistratuta " ;
    echo "<a href='ETXEBIDEZUB.html'>sakatu hemen</a>";
}
?>








