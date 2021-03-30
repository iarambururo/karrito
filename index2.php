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
	<div class="guztia container">
		<header>
			<nav class="navbar nav-pills nav-justified">
			  	<a class="nav-item nav-link active" href="#">IOI Errezeten web gunea</a>
			  	<hr class="elementu"/>
			  	<a class="nav-item nav-link" href="errezetak.php">Errezetak Bilatu</a>
			  	<hr class="elementu"/>
			  	<a class="nav-item nav-link" href="osagaiak.php">Osagaiekin Errezetak Egin</a>
			  	<hr class="elementu"/>
			  	<a class="nav-item nav-link" href="qr/index.html" tabindex="-1" aria-disabled="true">Erosketa Zerrendak</a>
			</nav>
		</header>

		<div id="carrusel" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active" data-duration="3000">
		      <img class="carrusel d-block w-100" src="irudiak/1.jpg">
		    </div>
		    <div class="carousel-item" data-duration="3000">
		      <img class="carrusel d-block w-100" src="irudiak/2.jpg">
		    </div>
		    <div class="carousel-item" data-duration="3000">
		      <img class="carrusel d-block w-100" src="irudiak/3.jpg">
		    </div>
		    <div class="carousel-item" data-duration="3000">
		      <img class="carrusel d-block w-100" src="irudiak/4.jpg">
		    </div>
		    <div class="carousel-item" data-duration="3000">
		      <img class="carrusel d-block w-100" src="irudiak/5.png">
		    </div>
		  </div>
		</div>

		<div class="container">
			<section class="row">
				<article id="nortzuk" class="nortzuk col-md-9">
					<h1>Nortzuk gara?</h1>
					<p>IOI technology hiru pertsonataz osatutako enpresa bat da, gure enpresaren helburua jendeari laguntzea da gure zerbitzuak eskaintzen.
					Hiru zerbitzu nagusi eskaintzen ditugu:
					<ul>
						<li>Karrito inteligentea</li>
						<li>Errezeta web aplikazioa</li>
						<li>Erosketarako lista</li>
					</ul>
					Web orri honetan gure errezeta eta lista aplikazioak aurkituko dituzue.</p>
				</article>

				<aside id="login" class="logina col-md-3">
					<h1>Login</h1>
					<p>Zure kontuarekin sartu eta gure orrialdeari ahalik eta gehien aprobetxu!</p>
					<!-- Implementacion de Ajax -->
					
					<form action="login.php" method="POST">
					Erabiltzailea<br/><input class="sartu" type="text" name="Erab_izena" placeholder="Erabiltzaile izena..."><br>
					Pasahitza<br/><input class="sartu" type="password" name="Pasahitza" placeholder="Pasahitza...">
					<input class="botoia btn btn-primary" type="submit" name="Sartu" value="Sartu">
					</form>
					<p>Oraindik ez zaude erregistratuta? Egin zure <a href="">erregistroa emen!</a></p>
				</aside>
				<script>
						function Kendu() {
									document.getElementById('login').style.visibility = "hidden";
						    		document.getElementById('login').style.display = "none";
						   			var element = document.getElementById("nortzuk");
  									element.classList.remove("col-md-9");
  									document.getElementById('nortzuk').style.paddingLeft = "2%";
  									document.getElementById('nortzuk').style.paddingRight = "2%";
  							}	
  							// console.log(erregistroa);		    
				</script>
				<button onclick="Kendu()">Kendu</button>
			</section>
		</div>
		<div id="box" class="container">
			<section >
				<article class="box">
					<h1>Konektibitatea</h1>
					<p>Gure enpresak gehien baloratzen duena da, enpresaren eta bezeroen arteko erlazioa. Hau bermatzeko eskeintzen dugun bezeroaren arreta ezinbestekoa da.<br/><br/>
					Honetaz gain, IOI Espaina guztian zehar topa dezakezue, enpresa askok onartu dituzte gure akordioak eta gure teknologia eskeini dieguabantaila batzuk izateko. Momentuz 4 enpresa ezberdinekin lortu dugu lan egitea eta espero dugu estadistika hau gora egitea.<br/><br/>
					Erabili ditzazkezue orain gure tableta berriak hurrengo supermerkatuetan:
					<ul>
						<li>Eroski</li>
						<li>Mercadona</li>
						<li>Lidle</li>
						<li>Dia</li>
					</ul></p>
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
					<li> Tel zenbakia: (+34) 682 46 51 08</li>
					<li> Korreoa: ioitechnology9899@gmail.com</li>
					<li> Instagram: <a href="https://www.instagram.com/ioi_technology/?hl=es">ioi_technology</a> </li>
					<li> Twitter: <a href="https://twitter.com/IoiTechnology?lang=es">@IoiTechnology</a></li>
					</ul>
				</div>
				<div class="besteak col-md-4">
					<hr>
					<h5>Besteak</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
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