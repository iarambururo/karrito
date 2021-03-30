<!DOCTYPE html>
<html>
<head>
	<title>IOI Technology</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estiloak.css">
</head>
<body>
	<div class="container">
		<header>
			<nav class="navbar nav-pills nav-justified">
			  	<a class="nav-item nav-link" href="index.php">IOI Errezeten web gunea</a>
			  	<hr class="elementu"/>
			  	<a class="nav-item nav-link" href="errezetak.php">Errezeta Berriak Bilatu</a>
			  	<hr class="elementu"/>
			  	<a class="nav-item nav-link" href="osagaiak.php">Osagaiekin Errezetak</a>
				<hr class="elementu"/>
			  	<a class="nav-item nav-link " href="zerrendak.php">Erosketa Zerrendak</a>
			</nav>
		</header>

		<div class="gorputza container">
			<section>
				<article>
					<h1>Zure kontua</h1>
					<?php
					session_start();

$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";
$tbl_name = "erabiltzaileak";
					$erabiltzailea = $_SESSION["erabiltzailea"];

					$konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);
					$select = "SELECT * FROM $tbl_name where Erab_izena = '$erabiltzailea'";

					$select2= mysqli_query($konexioa,"$select");
					$res2= mysqli_fetch_row($select2);


echo "<div id='datuak'>";

					echo "<h4>Erabiltzaile izena: $erabiltzailea</h4>";

			echo"<p>Izena: $res2[1]</p>";
			echo"<p>Abizena: $res2[2]</p>";
			echo"<p>Telefonoa: $res2[4]</p>";
echo "</div>";
			?>

									<form action="pasahitza_aldatu_edo_ezabatu.php" method="POST">
					<div class="atalak">
						Pasahitz zaharra:<br/><input class="sartu" type="password" name="Pasahitza" placeholder="Pasahitz zaharra..." pattern="[A-Za-z0-9_-]{6,}" oninvalid="this.setCustomValidity('Ezin dira Karaktere Bereziak erabili eta Minimo 6 Karaktere izan behar ditu!')" oninput="this.setCustomValidity('')" ></div><br/>
						<div class="atalak">
						Pasahitz berria:<br/><input class="sartu" type="password" name="Pasahitz_berria" placeholder="Pasahitz berria..." pattern="[A-Za-z0-9_-]{6,}" oninvalid="this.setCustomValidity('Ezin dira Karaktere Bereziak erabili eta Minimo 6 Karaktere izan behar ditu!')" oninput="this.setCustomValidity('')" ></div><br/>
						<a href='erabiltzailea.php'><button id='sartu_kontuarekin' class='botoia btn btn-primary' name='pazahitza_aldatu'>Pasahitza aldatu</button></a>

				<!-- Pasahitza konta borratzeko:<br/><input class="sartu" type="password" name="Pasahitza_borratzeko" placeholder="Pasahitza..." pattern="[A-Za-z0-9_-]{6,}" oninvalid="this.setCustomValidity('Ezin dira Karaktere Bereziak erabili eta Minimo 6 Karaktere izan behar ditu!')" oninput="this.setCustomValidity('')" ></div><br/>

						<a href='erabiltzailea.php'><button id='kontua_borratu' class='botoia btn btn-primary' name='kontua_borratu'>kontua borratu</button></a> -->
					</form>


				</article>
				<article id='listak'>

					 <script type="text/javascript">
					 	function bat(){
					 		document.getElementById("x").src="irudiak/X_dos.png";
					 	}
					 </script>
		 		</article>
			</section>
		</div>

		<div class="container">
			<footer class="row">
				<div class="arrazoiak col-md-4">
					<hr>
					<h5>Zergatik erabili gure WebOrria?</h5>
					<ul>
						<li>Azkartasuna erosketak egiteko</li>
						<li>Sukaldatzerako orduan denbora aurreztu</li>
						<li>Etxeko produktuei etekin handiena atera</li>
						<li>Beti gogoan izango duzu zer erosi</li>
					</ul>
				</div>
				<div class="kontaktatu col-md-4">
					<hr>
					<h5>Kontaktatu</h5>
					<ul>
					<li> Korreoa: ioitechnology9899@gmail.com</li>
					<li> Instagram: <a href="https://www.instagram.com/ioi_technology/?hl=es">ioi_technology</a> </li>
					<li> Twitter: <a href="https://twitter.com/IoiTechnology?lang=es">@IoiTechnology</a></li>
					</ul>
				</div>
				<div class="besteak col-md-4">
					<hr>
					<h5>Besteak</h5>
					<p>Gurekin lan egin nahi ba duzu langileak behar ditugu. Utzi dugun korreoaren bitartez mezu bat bidali "Lana" izenburua gehituz ;)</p>
				</div>
				<div class="egileak">
				<p>Iñaki Aranburu - Mikel Oliden - Ian Fernandez</p>
				</div>
			</footer>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
