<?php  
	if (isset($_POST['search'])) {

		$response = "<ul class='barra_ul'><li class='disabled'>Ez dago kointzidentziarik</li></ul>";

		$conexion = new mysqli("10.14.4.159", "karritoa", "Zubiri19", "karritoa");
		
		$q = $_POST['q'];
		$sql = $conexion->query("SELECT izena FROM osagaiak WHERE izena LIKE '$q%' ORDER BY izena");
		if ($sql->num_rows > 0) {

			$response = "<ul class='barra_ul'>";
				while ($data = $sql->fetch_array()) {
					$response .= "<li class='barra_lista'>".$data['izena']."</li>";
				}
			$response .= "</ul>";
		}
		exit($response);
	}
?>