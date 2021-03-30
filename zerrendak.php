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
			  	<a class="nav-item nav-link active" href="#">Erosketa Zerrendak</a>
			</nav>
		</header>

		<div class="gorputza container">
			<section>
				<article>
					<h1>Zure Zerrendak</h1>

					<form class="between" action="geitu.php" method="POST">
						<div class="x_zerrendak">
						  <a href="qr/index.html" ><img id="" src="irudiak/camara.png" alt="Informazioa"></a>
						</div>
						<div class="zerrenda_sortu"><input class="handia  form-control" type="text" name="zerrenda_geitu" placeholder="Lista berria sortu" maxlength="25" title="Idatzi sortu nahi duzun listaren izena" autofocus required autocomplete="off" /></div>
						<div class="gehitu"><button style="width: 150px" class="btn btn-primary">Gehitu</button></div>
					</form>

				</article>
				<article id='listak'>
					<?php
					error_reporting(0);
						session_start();
						$erabiltzailea = $_SESSION["erabiltzailea"];

						$bd = new mysqli("10.14.4.159", "karritoa", "Zubiri19", "karritoa");
						if(mysqli_connect_errno()) return;

						$select = "SELECT listak.Izena, listak.L_id FROM listak_erabiltzaileak, listak
							WHERE listak.L_id=listak_erabiltzaileak.L_id AND listak_erabiltzaileak.Erab_izena='$erabiltzailea'
							ORDER BY listak.L_id desc";

						if($res = $bd->query("$select"))




						while($fila = $res->fetch_array()) {
							echo "<div class='zerrenda_bakoitza'><div class='ellipsis'><a href='zerrendak_bakoitza.php?izena=$fila[0]&l_id=$fila[1]' class='esteka'>$fila[0]</a></div><div class='x_zerrendak'>
								<a class='x_zerrendak x' href='zerrendak_borratu.php?zerrenda=$fila[1]'>X</a></div></div>";
						}

					  	$bd->close();
					 ?>
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
