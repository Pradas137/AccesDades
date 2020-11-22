<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html>
 <head>
 	<title>Exemple de lectura de dades a MySQL</title>
    <style type="text/css">
        #Contenedor{
            margin-top: 10px;
            text-align: center;
        }
        #enlace{
            background-color: black;
            color: yellow;
            padding: 10px;
            border-radius: 20px;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
 </head>
 
 <body>
 	<h1 align="center">Exemple de lectura de dades a MySQL</h1>
    <form align="center" action="Tabla_Ciudades.php" method="post">
    	<select id="desplegable" name="pais">
    		<?php
    		$conn = mysqli_connect('localhost','adrian','Hakantor');
    		mysqli_select_db($conn, 'world');
    		$consulta = "SELECT name,code FROM country;";
    		$resultat = mysqli_query($conn, $consulta);
    		if (!$resultat) {
    			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
    			$message .= 'Consulta realitzada: ' . $consulta;
    			die($message);
    		}

    		if ($resultat) {
    			while($row = mysqli_fetch_assoc($resultat)) {
    				echo "<option>".$row['name']."</option>";
    			}
    		}
    		?>	
 		</select><br><br>
 		<input id="enlace" type="submit" name="submit" value="Seleccionar">
 	</form><br>
     <div id="Contenedor">
        <a href="Nueva_Ciudad.php" id="enlace">Nueva Ciudad</a>
    </div>
</body>
</html>