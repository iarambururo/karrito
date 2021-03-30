<?php
echo rand(0,100);
echo "hola";
$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";
$tbl_name = "erabiltzaileak";
$konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);
if(mysqli_connect_errno()) return;

    $select4= mysqli_query($konexioa,"SELECT erab_izena FROM karritoa.karritoak where k_id='$2y$10$3nyrF5q97f86fXWWzZeXse5UNHWrI/1mHzvOmPcsI9qbcwo2p9i5u'");
    $res4= mysqli_fetch_row($select4);

if ($res4[0] == null) {
   //echo"esta vacio";
   echo " no tenemos datos";
   

}
else{
    //esto apareze en el carro
echo "tenemos datos";
echo "<script>";
echo "window.location.href = 'index.html'";
echo "</script>";


}



?>
