<!DOCTYPE html>
<html>
<head>
	<title>Tabla de las ciudades</title>
	<style>
 		table,td {
 			border: 1px solid black;
 			border-spacing: 0px;
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
			$consultaCity = "select c.Name, ct.Name, c.Code from country c, city ct where c.Code = ct.CountryCode and c.Name = '".$_POST['pais']."';";
			$resultat = mysqli_query($conn ,$consultaCity);
			if ($resultat) {
				while($row = mysqli_fetch_assoc($resultat)) {
					$img = "<img src='gif/".strtolower($row['Code']).".gif'/>";
					echo "\t<tr>\n";
					echo "<td>".$row['Name']."</td>";
					echo "\t</tr>\n";
				}
			}
		}
		?>
 	</table>	
</body>
</html>