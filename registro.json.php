<?php

header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "proyecto_final_chat";



$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);




$sql = "SELECT nombre FROM usuario WHERE nombre='" . $data["nombre"] . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$sql = "UPDATE usuario SET ";
	$sql .= "nombre='" . $data["nombre"] . "',";
	$sql .= "password='" . $data["password"] . "'";

	$sql .= "WHERE nombre='" . $data["nombre"] . "'";
}




else {
	$sql = "INSERT INTO usuario (nombre, password) ";
	$sql .= " VALUES ('" . $data["nombre"] . "', '" . $data["password"] .  "')";
}

$result = $conn->query($sql);



$conn->close();
?>