<?php 

if (isset($_POST['logeatu'])){
$dato=$_SESSION['erabiltzaile_izena'];
echo(" document.getElementById(\"qrimage\").innerHTML=\"<img src=\'https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=$dato\'>\";  ");
header('Location: index.php');

}


?>