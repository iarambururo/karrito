<?php
session_start();

echo "hola";

$host_db = "10.14.4.159";
 $user_db = "karritoa";
 $pass_db = "Zubiri19";
 $db_name = "karritoa";


$konexioa = new mysqli($host_db,$user_db,$pass_db,$db_name);

$zerrenda = $_POST['zerrenda_geitu'];


$bilatu=" SELECT E.Izena,L.Izena,L.L_id 
FROM  Listak L, listak_erabiltzaileak LE, erabiltzaileak E

WHERE E.Erab_izena=LE.Erab_izena AND LE.L_id=L.L_id AND E.Erab_izena=' $_SESSION[erabiltzailea]' AND L.izena='$zerrenda';";

$proba = $konexioa -> query($bilatu);

$zenbatu = mysqli_num_rows($proba);
echo $zenbatu;

if ($zenbatu == 0) {

$erabiltzailea = $_SESSION['erabiltzailea'];

    $insertatu= "INSERT INTO  listak  (izena) values ('$zerrenda')";
    
     $proba2 = $konexioa -> query($insertatu);
            
            $buscar_si_tiene= "SELECT L_id from listak where izena='$zerrenda'";
            
            $select2= mysqli_query($konexioa,"SELECT L_id from listak where izena='$zerrenda' order by (L_id) desc;");
            $res2= mysqli_fetch_row($select2);
            

            $listak_erabiltzaileak= "INSERT INTO  listak_erabiltzaileak  values('$erabiltzailea',$res2[0])";
    
            $proba3 = $konexioa -> query($listak_erabiltzaileak);

            
      header('Location: zerrendak.php');
  
  
  }
  if ($zenbatu == 1) {
    echo'<script type="text/javascript">
     alert("Sartu duzun zerrenda sortua dago.");
     window.location.href="zerrendak.php";
     </script>';
  
  }
  


?>