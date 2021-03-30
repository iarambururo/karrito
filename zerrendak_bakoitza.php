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
			<?php
		$l_id = ($_GET["l_id"]);
	$konexioa = new mysqli("10.14.4.159", "karritoa", "Zubiri19", "karritoa");
  if(mysqli_connect_errno()) return;

  $select3= mysqli_query($konexioa,"SELECT listak.Izena FROM listak WHERE listak.L_id=$l_id;");
  $res3=mysqli_fetch_row($select3);

  $izena=$res3[0];

	//$izena = ($_GET["izena"]);
//echo $izena;
			echo"<h1>$izena</h1>"

?>

<!---------------------------autokonpletado------------------------------------>
<datalist id="nombres">
<?php
  $bd = new mysqli("10.14.4.159", "karritoa", "Zubiri19", "karritoa");
  if(mysqli_connect_errno()) return;

  if($res = $bd->query("SELECT izena FROM Produktuak order by izena"))
    while($fila = $res->fetch_array()) {
    	echo "<option value='";
    	echo $fila[0];
    	echo "'></option>\n";
	}

  $bd->close();
 ?>
</datalist>
<!----------------------------------------------------------------------------->
	<?php

echo "<form class='between' action='listetara_gehitu.php?l_id=$l_id' method='post'>";
	echo "<div style='margin-right: 3%'><a href='zerrendak.php'><img src='irudiak/atras.png' alt='Itzuli'></a></div>";

	echo"<div class='zerrenda_sortu'><input class='handia  form-control'' list='nombres' type='text' name='zerrenda_geitu' placeholder='Produktua sartu' maxlength='25' title='Idatzi izen bat lista berri bat sortzek0' autofocus required/></div>";


	echo "<div class='gehitu'><button style='width: 90%' class='btn btn-primary'>Gehitu</button></div>";
echo "</form>";
?>
	<?php
	echo "<article id='listak'>";
	$l_id = ($_GET["l_id"]);
	$_SESSION['l_id']=$l_id;
	$l_id=$_SESSION['l_id'];
	$bd = new mysqli("10.14.4.159", "karritoa", "Zubiri19", "karritoa");
	if(mysqli_connect_errno()) return;

  if($res = $bd->query("SELECT produktuak.Izena, listak.Izena,produktuak.p_id FROM produktuak, produktu_listak, listak
  WHERE produktuak.P_id=produktu_listak.P_id AND produktu_listak.L_id=listak.L_id AND listak.L_id=$_SESSION[l_id];"))

   while($fila = $res->fetch_array()) {
		echo "<div class='produktu_bakoitza'><div class='ellipsis'>$fila[0]</div><div class='x_zerrendak'>
								<a class='x_zerrendak x' href='listako_produktuak_borratu.php?p_id=$fila[2]&l_id=$l_id'>X</a></div></div>";
		}

		echo "</article>";
  $bd->close();
 ?>



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
