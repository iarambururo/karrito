<?php
session_start();

$errezeta= ($_GET["pasa"]);
$lista= ($_POST['bilatu']);
echo "</br>";
echo $errezeta;
echo "</br>";
echo $lista;


$host_db = "10.14.4.159";
$user_db = "karritoa";
$pass_db = "Zubiri19";
$db_name = "karritoa";
$tbl_name = "erabiltzaileak";


 $konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);


//-----------------------Saca el o_id de cada producto que tiene una rezeta-------------------------------//
$select2= mysqli_query($konexioa,"SELECT O.o_id from osagaiak O, errezetak_osagaiak EO, errezetak E where O.o_id=EO.o_id and EO.E_id=E.E_id and E.Izena='$errezeta';");
$res2= mysqli_fetch_row($select2);
$erabiltzaile =  $_SESSION['erabiltzailea'];
//----------------------saca el L_id con el nombre de cada lista------------------------------------------//
$select4= mysqli_query($konexioa,"SELECT L.L_id 
from Listak L, listak_erabiltzaileak LE, erabiltzaileak E
where E.Erab_izena=LE.Erab_izena and LE.L_id=L.L_id and E.Erab_izena='$erabiltzaile' and L.izena='$lista';");
$res4= mysqli_fetch_row($select4);




$lista_numero = $res4[0];

while($res2 !=""){

//-----------------------Saca el P_id con la respuesta de $select2----------------------------------------//
$select3=  mysqli_query($konexioa,"
select P_id, produktuak.Izena,osagaiak.o_id from produktuak, osagaiak
where produktuak.o_id=osagaiak.o_id  and osagaiak.o_id=$res2[0] group by osagaiak.o_id ");
$res3=mysqli_fetch_row($select3);

//--------------------hace una insercion de cada P_id en la tabla de "produktu_listak"--------------------//
  $insertatu= "INSERT INTO produktu_listak values('$lista_numero',$res3[0])";
$proba = $konexioa -> query($insertatu);
 $res2= mysqli_fetch_row($select2);

}
$l_id=$res4[0];
header('Location: zerrendak_bakoitza.php?l_id='.$l_id)

?>
