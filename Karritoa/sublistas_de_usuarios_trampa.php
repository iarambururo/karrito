<?php 

session_start();
$conexion = mysqli_connect('10.14.4.159', 'karritoa', 'Zubiri19', 'karritoa');

if (isset($_POST['insertar'])){
    $l_id=$_SESSION['l_id'];
    $insert= mysqli_query($conexion,"INSERT INTO produktu_karritoan(K_id,P_id,Kantitatea,Pre_totala)
        VALUES('$_SESSION[erabiltzaile_izena]','$_POST[codigo_de_barras]',1,(SELECT karritoa.produktuak.Prezioa
        FROM karritoa.produktuak
        WHERE karritoa.produktuak.P_id='$_POST[codigo_de_barras]'));");
    $insertar = mysqli_fetch_row($insert);
    


echo $_SESSION['l_id'];
	#--------------------produktuak borratu berdinak daudenean---------------------

$sql3 = mysqli_query($conexion, "SELECT 
	pl.p_id FROM produktu_listak pl, produktu_karritoan pk
WHERE pl.p_id = pk.p_id AND l_id =$_SESSION[l_id] AND k_id ='$_SESSION[erabiltzaile_izena]';");
		$sub_listak1 = mysqli_fetch_row($sql3);

		while ($sub_listak1 != ""){
			
			

			$borratu = mysqli_query($conexion,"DELETE FROM produktu_listak 
			WHERE
				l_id = $_SESSION[l_id] and p_id= $sub_listak1[0];");
			        $sub_listak1 = mysqli_fetch_row($sql3);
		}

    #-------------------------------------------------------------------------------
    header('location:sublistas_de_usuarios.php?lista_id='.$l_id);
    }

	#--------------------produktuak borratu berdinak daudenean---------------------

    $sql3 = mysqli_query($conexion, "SELECT 
	pl.p_id FROM produktu_listak pl, produktu_karritoan pk
WHERE pl.p_id = pk.p_id AND l_id =$_SESSION[l_id] AND k_id ='$_SESSION[erabiltzaile_izena]';");
		$sub_listak1 = mysqli_fetch_row($sql3);

		while ($sub_listak1 != ""){
			
			

			$borratu = mysqli_query($conexion,"DELETE FROM produktu_listak 
			WHERE
				l_id = $_SESSION[l_id] and p_id= $sub_listak1[0];");
			        $sub_listak1 = mysqli_fetch_row($sql3);
		}
        header('location:sublistas_de_usuarios.php?lista_id='.$l_id);
	#-------------------------------------------------------------------------------
?>