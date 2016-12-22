<?php
	// CONEXION BBDD
$servername = "localhost";
$username = "root"; 
$password= "";
$dbname = "listaespera";
$conn = new mysqli($servername, $username, $password, $dbname);


var_dump($_POST);

	// Check connection
if ($conn->connect_error) {
	die("Error: " . $conn->connect_error);
}





echo json_encode($lastID);

$stringJSON = file_get_contents('php://input');

/*if (isset($stringJSON){

	$json = json_decode($stringJSON);
	$abierta = $json->abierta;


	$sql = "UPDATE peticiones SET abierta='".$abierta."', fechaFin = NOW() WHERE idPeticion='".$idPeticion."';";


	if ($conn->query($sql) === TRUE) {
		echo "Insertado nueva pregunta";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}*/

?>