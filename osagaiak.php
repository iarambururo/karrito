<!DOCTYPE html>
<html>
<head>
	<title>IOI Technology</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estiloak.css">

	<style>
		.search{width: 100%;}
		.ordenatu{position: relative;}
		.resultado{position: absolute;
			width: 80%;
			z-index: 100;
			left: -2%;
			top: 92%;}
		.barra_ul{list-style: none;
			float: left;
			padding: 0px;
			margin-top: 0px;
			color: black;
			border: 1px solid black;
			width: 100%;
			border-radius: 8px 8px 8px 8px;
			overflow-y: scroll;
			max-height: 400px;
			background: white;}
		.barra_lista{margin-top: 1.5%;
			margin-bottom: 1.5%;
			padding-top: 1%; 
			padding-bottom: 1%;
			padding-left: 5%;}
		.barra_lista:hover{background: #0088cc;
			color: black;}

		.disabled{color: #4B4B4B;
			margin-top: 1.5%;
			margin-bottom: 1.5%;
			padding-left: 5%;}
	</style>

</head>
<body>
	<div class="container">
		<header>
		<nav class="navbar nav-pills nav-justified">
		  	<a class="nav-item nav-link" href="index.php">IOI Errezeten web gunea</a>
		  	<hr class="elementu"/>
		  	<a class="nav-item nav-link" href="errezetak.php">Errezeta Berriak Bilatu</a>
		  	<hr class="elementu"/>
		  	<a class="nav-item nav-link active" href="#">Osagaiekin Errezetak</a>
		  	<hr class="elementu"/>
		  	<a class="nav-item nav-link" href="zerrendak.php">Erosketa Zerrendak</a>
		</nav>
		</header>
		<section>
			<div class="goikaldea container">
				<article>
					<div class="ordenatu">
						<div id="infor">
						  <a class="" data-toggle="collapse" href="#informazioa" role="button" aria-expanded="false" aria-controls="informazioa"><img id="" src="irudiak/info.png" alt="Informazioa"></a>
						</div>
						<form  action="aukeratutako.php" method="post" id="inprimakia2" autocomplete="off">

						  <div class="ordenatu autocomplete">
<!---------------------------autokonpletado OBSOLETO--------------------------------------------------------------------------------------------->
<datalist id="nombres">
<?php
session_start();
error_reporting(0);
  $bd = new mysqli("10.14.4.159", "karritoa", "Zubiri19", "karritoa");
  if(mysqli_connect_errno()) return;

  if($res = $bd->query("SELECT izena FROM osagaiak order by izena"))
    while($fila = $res->fetch_array()) {
    	echo "<option value='";
    	echo $fila[0];
    	echo "'></option>\n";
    }
  $bd->close();
 ?>
</datalist>
<!-------------------------------------------------------------------------------------------------------------------------------------------------->

						    <!-- <input id="handia" class="handia barra form-control" list="nombres" type="text" name="bilatu" placeholder="Osagaiaren izena"  autofocus/>
						    <input class="botoia btn btn-primary" type="submit" value="Gehitu"> -->

						    <input type="text"  id="search" class="search handia barra form-control" name="bilatu" placeholder="Errezetaren Izena..." autofocus onblur='this.focus()' autocomplete="off">
							<input class="botoia btn btn-primary" type="submit" value="Bilatu">
								<div id="response" class="resultado">
									<!--Aqui se printean las opciones que te da el buscador-->
								</div>

						</div>
						</form>
					</div>
					<div class="collapse" id="informazioa">
					  <div class="card card-body">
					    <p>Sartu nahi duzun osagaiaren izena, osagai horiekin egin daitezkeen errezetak ikusteko.</p>
					    <p id="alerta">Aukera hau erabiltzeko erregistratu behar zara!</p>
					  </div>
					</div>
				</article>
			</div>
			<div class="gorputza container">
				<article class="row">
					<div class="osagaiak col-md-5">
						<h1 class="izenburuak">Osagaiak</h1>
						

							<?php
							//	session_start();
								$erabiltzailea=$_SESSION['erabiltzailea'];
								if (isset($erabiltzailea)) {
								
									 $host_db = "10.14.4.159";
									 $user_db = "karritoa";
									 $pass_db = "Zubiri19";
									 $db_name = "karritoa";



									 $konexioa = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');


									 $select=mysqli_query($konexioa,"SELECT izena from aukeratutako_produktuak where erab_izena='$erabiltzailea' group by o_id");
									 $res= mysqli_fetch_row($select);

									 while($res !=""){
									 echo "<div class='osagaien_lista'>$res[0]<a class='x_osagai x' href='osagaiak_borratu.php?osagaia=$res[0]'>X</a></div>";
									 $res= mysqli_fetch_row($select);

									 }

									echo "<br/>";
									echo "<div id='ezabatu'>";
										echo "<a href='borratu.php'>";
											echo "<img src='irudiak/delete.png'>";
										echo "</a>";
									echo "</div>";
								}
							?>

						

					</div>
					<div class="errezetak_osagaiekin col-md-7">
						<h1 class="izenburuak">Errezetak</h1>
						<div class="borde">
							<a href="errezeta_bakoitza.html"></a>

							<?php
								$erabiltzailea=$_SESSION['erabiltzailea'];
								if (isset($erabiltzailea)) {
								
									 $host_db = "10.14.4.159";
									 $user_db = "karritoa";
									 $pass_db = "Zubiri19";
									 $db_name = "karritoa";



									 $konexioa = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');
									 $kantitatea = mysqli_query($konexioa,"SELECT count(izena) from aukeratutako_produktuak
									 where erab_izena='$erabiltzailea'
									 ");

									 $res= mysqli_fetch_row($kantitatea);

									 $sqla = mysqli_query($konexioa,"SELECT E.izena
										from errezetak_osagaiak EO, errezetak E, osagaiak O
										where EO.E_id=E.E_id and O.O_id=EO.O_id and eo.o_id in (SELECT o_id from aukeratutako_produktuak
										where erab_izena='$erabiltzailea'
										group by o_id)
										group by e.e_id
										HAVING count(EO.E_id)>= $res[0]");


									 $res2= mysqli_fetch_row($sqla);

									while($res2 !=""){
									echo "<div> <a class='errezetak_osagaiena' href='errezeta_bakoitza.php?bilatu=$res2[0]'>$res2[0]</a></div>";
									$res2= mysqli_fetch_row($sqla);
									}
								}
							?>
						</div>
					</div>
				</article>
			</div>
		</section>
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


	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="o_search.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
