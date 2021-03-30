<?php
////nl2br() para hacer enter creo
//para quitar los errores
//error_reporting(0);

if (isset($_POST['bilatu'])){
  $izena = ($_POST['bilatu']);
}
if (isset($_GET['bilatu'])){
  $izena = ($_GET["bilatu"]);
}


if ($izena == false){
    header('errezetak.php');
}

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo"	<title>Errezetak Bilatu</title>";
echo	"<meta charset='utf-8'>";
echo	"<meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0'>";
echo	"<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' integrity='sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS' crossorigin='anonymous'>";
echo	"<link rel='stylesheet' type='text/css' href='estiloak.css'>";
echo "</head>";
echo "<body>";
$conexion = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');





$select= mysqli_query($conexion,"select * from errezetak where izena = '$izena'");
$res= mysqli_fetch_row($select);


$select2= mysqli_query($conexion,"select O.Izena from osagaiak O, errezetak_osagaiak EO, errezetak E where O.o_id=EO.o_id and EO.E_id=E.E_id and E.Izena='$izena';");
$res2= mysqli_fetch_row($select2);


echo	"<div class='e_b container'>";
echo		"<header>";
echo			"<nav class='navbar nav-pills nav-justified'>";
echo			  	"<a class='nav-item nav-link' href='index.php'>IOI Errezeten web gunea</a>";
echo			  	"<a class='nav-item nav-link' href='errezetak.php'>Errezeta Berriak Bilatu</a>";
echo			  	"<a class='nav-item nav-link' href='osagaiak.php'>Osagaiekin Errezetak</a>";
echo			  	"<a class='nav-item nav-link' href='zerrendak.php' tabindex='-1' aria-disabled='rue'>Erosketa Zerrendak</a>";
echo			"</nav>";
echo		"</header>";

echo		"<div class='colore container'>";
echo			"<section>";
echo				"<article>";
echo					"<h1>$res[1]</h1>";
echo				"</article>";
echo				"<article class='eskuina'>";
echo					"<h5>$res[3] min</h5>";
echo					"<img class='pertsona' src='irudiak/personas.png'>";
echo					"<h5>$res[5]</h5>";

echo				"</article>";
echo        "<hr/>";
echo				"<article class='row'>";
echo					"<div class='col-md-7'>";
echo						"<h2><u>Osagaiak</u></h2>";
echo                    "</br>";

echo						"<ul>";
while($res2 !=""){
echo							"<li> $res2[0]</li>";
$res2= mysqli_fetch_row($select2);
}
echo						"</ul>";

echo					"</div>";
echo					"<div class='irudiak_div col-md-5'>";


echo              "";
echo "<div class='gomendioak autocomplete'>";
echo "<datalist id='nombres'>";

session_start();
$erabiltzailea = $_SESSION["erabiltzailea"];

  $bd = new mysqli("10.14.4.159", "karritoa", "Zubiri19", "karritoa");
  if(mysqli_connect_errno()) return;

  if($res3 = $bd->query("SELECT listak.Izena,listak.L_id FROM listak_erabiltzaileak, listak
  WHERE listak.L_id=listak_erabiltzaileak.L_id AND listak_erabiltzaileak.Erab_izena='$erabiltzailea'"))
    while($fila = $res3->fetch_array()) {
    	echo "<option value='";
    	echo $fila[0];
    	echo "'></option>\n";
    }
  $bd->close();

echo "</datalist>";

echo "<form class='between' action='osagaiak_listetara.php?pasa=$izena' method='post' id='inprimakia2' autocomplete='on'>";

echo "<div class='zerrenda_sortu'><input id='handia' class='handia gehitu2 form-control' style='width: 200px;' list='nombres' type='text' name='bilatu' placeholder='Zerrendaren izena...''></div>";


echo "<div class=''><input class='botoia btn btn-primary' type='submit' value='Gehitu'></div>";


//echo 						"<a href='osagaiak_listetara.php'<button class='btn btn-primary'>Gehitu Listara</button></a>";

echo "</form>";
echo "</div>";

echo						"<div class='irudiak'><img width='100%' height='100%' src='img/$res[4]'></div>";
echo					"</div>";
echo				"</article>";
echo				"<article>";
echo					"<h2><u>Elaborazioa</u></h2>";
echo                    "</br>";  
echo					"<p id='elaborazioa'> $res[2]</p>";
echo                    "</br>";

echo				"</article>";
echo			"</section>";
echo		"</div>";

echo		"<div class='container'>";
echo			"<footer class='row'>";
echo				"<div class='arrazoiak col-md-4'>";
echo					"<hr>";
echo					"<h5>Zergatik erabili gure WebOrria?</h5>";
echo					"<ul>";
echo						"<li>Azkartasuna erosketak egiteko</li>";
echo						"<li>Sukaldatzerako orduan denbora aurreztu</li>";
echo						"<li>Etxeko produktuei etekin handiena atera</li>";
echo						"<li>Beti gogoan izango duzu zer erosi</li>";
echo					"</ul>";
echo				"</div>";
echo				"<div class='kontaktatu col-md-4'>";
echo					"<hr>";
echo					"<h5>Kontaktatu</h5>";
echo					"<ul>";
echo					"<li> Korreoa: ioitechnology9899@gmail.com</li>";
echo					"<li> Korreoa: ioitechnology9899@gmail.com</li>";
echo					"<li> Instagram: <a href='https://www.instagram.com/ioi_technology/?hl=es'>ioi_technology</a> </li>";
echo					"<li> Twitter: <a href='https://twitter.com/IoiTechnology?lang=es'>@IoiTechnology</a></li>";
echo					"</ul>";
echo				"</div>";
echo				"<div class='besteak col-md-4'>";
echo					"<hr>";
echo					"<h5>Besteak</h5>";
echo					"<p>Gurekin lan egin nahi ba duzu langileak behar ditugu. Utzi dugun korreoaren bitartez mezu bat bidali &quot;Lana&quot; izenburua gehituz ;)</p>";
echo				"</div>";
echo				"<div class='egileak'>";
echo				"<p>Iñaki Aranburu - Mikel Oliden - Ian Fernandez</p>";
echo				"</div>";
echo			"</footer>";
echo		"</div>";

echo	"<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>";
echo	"<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js' integrity='sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut' crossorigin='anonymous'></script>";
echo	"<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js' integrity='sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k' crossorigin='anonymous'></script>";
echo "</body>";
echo "</html>";


?>
