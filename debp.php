<?php



    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "proyecto_final_chat";


    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);     

    //$nombre_ = $_GET["apodo"];
    //$nombre_ = "gordillo";

    function formatoF($fecha){
    	return date('g:i a', strtotime($fecha));
    }
?>

    <?php
         $consulta = "SELECT * FROM chat ORDER BY id DESC";

         //$consulta = "SELECT * FROM chat WHERE nombre='$nombre_' ORDER BY id DESC";
         $ejecutar = $conn->query($consulta);
         while($fila = $ejecutar->fetch_array()):
     ?>
            
              <div id="datos_chat">
              <span style="color:blue;"> <?php echo $fila['nombre'];  ?> </span>
              <span style="color:gray;"> <?php echo $fila['mensaje'];  ?></span>
              <span style="float:right;"> <?php echo formatoF($fila['fecha']);  ?></span>
              </div>
     <?php endwhile; ?>