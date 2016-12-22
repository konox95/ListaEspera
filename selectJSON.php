<?php
	// CONEXION BBDD
	$servername = "localhost";
	$username = "root"; 
	$password= "";
	$dbname = "listaespera";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Error: " . $conn->connect_error);
	}

	// DISPENSADOR
	$query = "SELECT * FROM peticiones WHERE abierta=1";

	$result = $conn->query($query);
	$arraylista=array();
	if($result->num_rows > 0) {
		while (($row = $result->fetch_assoc()) != null) {
			$idPeticion = $row['idPeticion'];
			$usuario = $row['usuario'];
			$texto = $row['texto'];
			$fechaInicio = $row['fechaInicio'];
			
			$lista=array();
			$lista["idPeticion"] = $idPeticion;
			$lista["usuario"]= $usuario;
			$lista["texto"] = $texto;
			$lista["fechaInicio"]= $fechaInicio;
			array_push($arraylista, $lista);
		}

		echo json_encode($arraylista);
		
	} else {
		echo "<p>No hay ningún depositos disponibles</p>";
	}
?>