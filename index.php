
<!DOCTYPE html>

<html>
<heap>
	<title>Chat
	</title>

	<link rel="stylesheet" type="text/css" href="estilos.css">
	
	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest(); //instanciar ajax
			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200){
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'dbp.php',true); //abrir archivo chat.php
			req.send();
		}
	
		setInterval(function(){ajax();}, 1000) ///refrescar cada 1000 milisegundos (1s)
	</script>
	

</heap>

<body onload="ajax();">

	
	<div id="contenedor">
		<div id="caja_chat">
			<div id="chat">

			
			
			</div>
		</div>
		<form method="POS" action="index.php">

		
<input type="text" name="nombre" placeholder="ingrese nombre">
			

			<textarea name="mensaje" placeholder="ingrese mensaje"></textarea>
			<input type="submit" name="enviar" value="Enviar">
		</form>
		
		<?php
		
		
		
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "proyecto_final_chat";

		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error); 



    	//$nombre_ = "diana";

		
		
		if (isset($_POS['enviar'])){
				$nombre_ = $_POST['nombre'];
				
				$mensaje_ = $_POST['mensaje'];


				$consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre_', '$mensaje_')";
				$ejecutar = $conn->query($consulta);
			
				if($ejecutar){
					echo "<embed loop='false' src='sonido.mp3' hidden='true' autoplay='true'>";
				}
			
		}
		?>
		
	</div>
					
</body>

</html>