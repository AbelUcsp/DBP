<?php
header("Content-Type: text/javascript");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "proyecto_final_chat";
 
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT nombre FROM usuario";
$result = $conn->query($sql);
$alumnos = array();

while($row = $result->fetch_assoc()) {
    $nombre = $row["nombre"];
    $item = '{"nombre": "' . $nombre . '"}';
    array_push($alumnos, $item);
}
echo "[" . implode(", ", $alumnos) . "]";

$conn->close();
?>