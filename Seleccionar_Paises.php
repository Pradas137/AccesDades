<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html>
 <head>
 	<title>Seleccionar Pais</title>
    <style type="text/css">
        body{
            background: #00FFFF;
        }
        label{
            font-size: 30px;
        }
        #Contenedor{
            margin-top: 10px;
            text-align: center;
        }

        #desplegable{
            font-size: 20px;
        }

        input{
            font-size: 20px;
        }

        #enlace{
            background-color: black;
            color: yellow;
            padding: 10px;
            border-radius: 20px;
            text-decoration: none;
            cursor: pointer;
            font-size: 25px;
        }
    </style>
 </head>
 
 <body>
    <h1 align="center">Exemple de lectura de dades a MySQL</h1>
    <form align="center" action="Tabla_Ciudades.php" method="post">
        <label>Paises:</label><br>
    	<select id="desplegable" name="pais">
    		<?php
    		$conexion = mysqli_connect('localhost','adrian','Hakantor');
    		mysqli_select_db($conexion, 'world');
            $consulta = "SELECT code,name FROM country;";
    		$resultat = mysqli_query($conexion, $consulta);
    		if (!$resultat) {
    			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
    			$message .= 'Consulta realitzada: ' . $consulta;
    			die($message);
    		}

    		if ($resultat) {
    			while($fila = mysqli_fetch_assoc($resultat)) {
    				echo "<option>".$fila['name']."</option>";
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