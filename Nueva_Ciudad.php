<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Ciudad</title>
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

    <?php
    $conexion = mysqli_connect('localhost','adrian','Hakantor');
    mysqli_select_db($conexion, 'world');
    if (isset($_POST['CodigoPais']) && isset($_POST['Nombre']) && isset($_POST['Distrito']) && isset($_POST['Poblacion']))
    {
        $consulta = "INSERT INTO city (Name,CountryCode,District,Population) VALUES ('".$_POST['Nombre']."','".$_POST['CodigoPais']."','".$_POST['Distrito']."',".$_POST['Poblacion'].")";
        if (mysqli_query($conexion, $consulta)) {
            echo "<p align='center'>Nueva Ciudad Añadida<p>";
        } else {
            echo "<p align='center'>Error al Añadir la Ciudad</p>";
        }
    }

    $consulta = "SELECT Code,Name FROM country;";
    $resultat = mysqli_query($conexion, $consulta);
    if (!$resultat) {
        $mensaje  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
        $mensaje .= 'Consulta realitzada: ' . $consulta;
        die($mensaje);
    }
    ?>
    <h1 align="center">Añadir una Ciudad</h1>

    <form align="center" method="post" action="Nueva_Ciudad.php">
    <label >Pais:</label><br>
    <select name="CodigoPais" required>
    <?php
    mysqli_data_seek($resultat, 0);
    while ($registro = mysqli_fetch_assoc($resultat)) {
        echo "<option value=\"".$registro['Code']."\">".$registro['Name']."</option>\n";
    }
    ?>
    </select><br>
    <label>Ciudad:</label><br>
    <input type="text" name="Nombre" placeholder="Ciudad" required><br>
    <label>Distrito:</label><br>
    <input type="text" name="Distrito" placeholder="Distrito"required><br>
    <label>Poblacion:</label><br>
    <input type="number" name="Poblacion" placeholder="Poblacion" required><br>
    <input id="enlace" type="Submit" value="Añadir">
    </form><br>
 <div id="Contenedor">
        <a href="ConeccionHome.php" id="enlace">Seleccionar Ciudades</a>
    </div>
 </body>
</html>