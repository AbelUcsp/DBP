<?php

header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "proyecto_final_chat";



	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

	$consulta = mysqli_query($conn, "SELECT * FROM usuario WHERE nombre='".$data["nombre"]."'");
	if(mysqli_num_rows($consulta)>0)
	{
		$consulta = mysqli_query($conn, "SELECT * FROM usuario WHERE password='".$data["password"]."'");
		if(mysqli_num_rows($consulta)>0){
			echo(1);
				
		}
		else{
			echo(0);
		}
	}


$conn->close();
?>