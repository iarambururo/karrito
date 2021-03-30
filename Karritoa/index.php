<!DOCTYPE html>
<html>
<head>
    <title>IOI Technology</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<!----------------------------------------------------------------------------------------->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ejecutar una función cada x segundos con jQuery Demo</title>
<meta name="description" content="Cada 3 segundos se va a cambiar de color el fondo de esta Web."/>
<meta name="author" content="Jose Aguilar">
<link rel="shortcut icon" href="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/favicon.ico" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!----------------------------------------------------------------------------------------->
</head>
<style>
    body{background-image: url("irudiak/Fondo.jpg");
        background-repeat: no-repeat;
        background-size: 800px 600px;}
    #argazkia{
        position: absolute;
        top: 85px;
        left: 350px;}
    h1{text-align: center;}


    #qrimage{position: absolute;
        left: 300px;}
</style>
<script type="text/javascript">
$(document).ready(function() {
    function changeNumber() {
        value = $('#value').text();
        $.ajax({
            type: "POST",
            url: "add.php",
            success: function(data) {
                $('#value').html(data);

            }
        });
    }
    setInterval(changeNumber, 1000);
});
</script>
<body >
<?php
ini_set("session.cookie_lifetime","7200");

session_start();

$karrito_zenbakia=rand(1,99999999);
$karrito_zenbakia_cifrado=password_hash($karrito_zenbakia,PASSWORD_DEFAULT);
  $_SESSION['erabiltzaile_izena']=$karrito_zenbakia_cifrado;
?>
    <h1>IOI Technology</h1>
    <div id="argazkia">

        <form  action="login.php" method="post">
            <input type="text" size="10" name="usuario" autocomplete="off" onblur='this.focus()' autofocus/>
            <br><br><br><br><br> <br><br><br>

            <!-- <button>Sartu</button><button>Erregistratu</button><button>Irtem</button>-->
            <p><input class="btn btn-primary" type="submit" name= "Sartu"  value="Sartu"/>
                </p>
        </form>
        <form  action="index.php" method="post">
    <input class="btn btn-primary" type="submit" name= "logeatu"  value="Logeatu"/>
    </form>
    </div>
    <div id="qrimage"><img src="irudiak/Logo.PNG" alt="Logo"></div>

<!--------------------------------------------------------------------->

  <div id="content" class="col-lg-12">
            <span id="value"></span>
        </div>


<?php





$inicio = $_SESSION['erabiltzaile_izena'];
  //Konexioa burutu:

      $conexion = new mysqli("10.14.4.159","karritoa","Zubiri19","karritoa");

   $sql = "select * from erabiltzaileak e where e.erab_izena=
   (select erab_izena from karritoak k where k_id='$inicio' ) ";

   $buscar_usuario = $conexion -> query($sql);

   $kontatu = mysqli_num_rows($buscar_usuario);


?>





<script type="text/javascript">

<?php
if (isset($_POST['logeatu'])){
$dato=$_SESSION['erabiltzaile_izena'];
echo(" document.getElementById(\"qrimage\").innerHTML=\"<img src=\'https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=$dato\'>\";  ");

$conexion = new mysqli("10.14.4.159","karritoa","Zubiri19","karritoa");

   $sql = "select * from erabiltzaileak e where e.erab_izena=
   (select erab_izena from karritoak k where k_id='$inicio' ) ";

   $inserta = mysqli_query($conexion, "INSERT INTO karritoak (K_id, erab_izena) VALUES ('$_SESSION[erabiltzaile_izena]',  null );");

}
?>

</script>
<!------------------------------------------------------------------>




</body>
</html>
