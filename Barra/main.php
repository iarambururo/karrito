<?php  
	
	if (isset($_POST['search'])) {

		$response = "<ul><li class='disabled'>Ez daude kointzidentziarik</li></ul>";

		$conexion = new mysqli("10.14.4.159", "karritoa", "Zubiri19", "karritoa");
		
		$q = $_POST['q'];
		$sql = $conexion->query("SELECT izena FROM errezetak WHERE izena LIKE '$q%' ORDER BY izena");
		if ($sql->num_rows > 0) {

			$response = "<ul>";
				while ($data = $sql->fetch_array()) {
					$response .= "<li>".$data['izena']."</li>";

				}
			$response .= "</ul>";

		}

		exit($response);
	}
	
?>	