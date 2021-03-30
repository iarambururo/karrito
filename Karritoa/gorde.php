<?php


  $host_db = "10.14.4.159";
   $user_db = "Inaki";
   $pass_db = "Zubiri19";
   $db_name = "karritoa";






     //konexioa egin

     $conexion = new mysqli($host_db,$user_db,$pass_db,$db_name);

      $insert= mysqli_query($conexion,"INSERT into karritoa.produktuak
        values('$_POST[produktu_id]','$_POST[izena]','$_POST[marka]','$_POST[mota]','$_POST[deskribapena]','$_POST[prezioa]','$_POST[o_id]')");
header('location:Produktuak_sartu.html');













 ?>
