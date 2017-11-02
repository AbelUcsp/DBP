<!DOCTYPE HTML>
<html>
<body>
<?php
header("Content-Type: text/html");

$dbhost = "localhost";
$dbuser = "abel";
$dbpass = "qwerty";
$db = "academico";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);     

$sql = "SELECT codigo, nombre, apellido FROM alumno";
if (isset($_GET["cod"])) {
 $sql = "$sql WHERE codigo=" . $_GET["cod"];

}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo "<tr><th>Codigo</th><th>Nombres</th><th>Apellidos</th><th>Cursos</th></tr>";
    while($row = $result->fetch_assoc()) {
        $codigo = $row["codigo"];
        echo "<tr><td>$codigo</td><td>" . $row["nombre"]. "</td><td>" ;
        echo $row["apellido"]. "</td> <td><a href='XAAP.php?cod=$codigo'>Ver Cursos</a></td> ";
        /*echo $row["apellido"]. "</td> <td><a href='XAAP.php'>Ver Cursos</a></td> ";*/
    }
    echo  "</tr></table>";
} else {
    echo "No hay resultados 667";
}


$conn->close();
?>
</body>
</html>




///XAAP.php
    <!DOCTYPE HTML>
    <html>
    <body>
    <?php
    header("Content-Type: text/html");

    $dbhost = "localhost";
    $dbuser = "abel";
    $dbpass = "qwerty";
    $db = "academico";
     
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

         
    $sql = "SELECT curso_id, nombreC FROM curso";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo "<tr><th>Codigo</th><th>Cursos</th></tr>";
        while($row = $result->fetch_assoc()) {
            $codigo = $row["curso_id"];
            echo "<tr><td>$codigo</td><td>" ;
            echo $row["nombreC"]."</td>";
        }
        echo "</table>";
		
		
    } else {
        echo "No hay resultados CURSOS";
    }


    $conn->close();
    ?>
    </body>
    </html>
	
	
	
	