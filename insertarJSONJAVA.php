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





$stringJSON = file_get_contents('php://input');


if (isset($stringJSON)) {
	$ip=$_SERVER['REMOTE_ADDR'];
	$json = json_decode($stringJSON);
	$user = $json->usr;
	$preg = $json->pregunta;

	$sql = "INSERT INTO peticiones (direccionIP, usuario, texto, abierta, fechaInicio, fechaFin) VALUES ('".$ip."', '".$user."', '".$preg."', '1', NOW(), '0000-00-00 00:00:00');";

	if ($conn->query($sql) === TRUE) {
		$last_id = mysqli_insert_id($conn);
	//var_dump($last_id);
		$lista=array();
		$lista["id"] = $last_id;
		echo json_encode($lista);
	//var_dump($lista);		
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}


}



?>

