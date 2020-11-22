<!DOCTYPE html>
<html>
<head>
	<title>Tabla de las ciudades</title>
	<style>
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
 		table,td {
 			border: 1px solid black;
 			border-spacing: 0px;
 			font-size: 20px;
 			width: 250px; height: 100px;
 			text-align: center;
 		}
 		img{
 			width: 50px; height: 40px;
 		}
 	</style>
</head>
<body>
	<?php
	$conn = mysqli_connect('localhost','adrian','Hakantor');
	mysqli_select_db($conn, 'world');
	$consulta = "SELECT name,code FROM country;";
	$resultat = mysqli_query($conn, $consulta);
    ?>
    <h1 align="center">Ciudades</h1>
	<table align="center">
		<thead>
			<td colspan="4" align="center" bgcolor="cyan">Tabla Ciudades</td>
		</thead>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["pais"])) {
			$consultaCity = "select coun.Name, cit.Name, coun.Code from country coun, city cit where coun.Code = cit.CountryCode and coun.Name = '".$_POST['pais']."';";
			$resultat = mysqli_query($conn ,$consultaCity);
			if ($resultat) {
				while($row = mysqli_fetch_assoc($resultat)) {
					$img = "<img src='./Banderas/".strtolower($row['Code']).".gif'/>";
					echo "\t<tr>\n";
					echo "<td>".$img."</td>";
					echo "<td>".$row['Name']."</td>";
					echo "\t</tr>\n";
				}
			}
		}
		?>
 	</table><br>
 	 <div id="Contenedor">
        <a href="ConeccionHome.php" id="enlace">Seleccionar Paises</a>
    </div>
</body>
</html>