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
     <?php
     $conn = mysqli_connect('localhost','adrian','Hakantor');
     mysqli_select_db($conn, 'world');

     if (isset($_POST['CountryCode']) && isset($_POST['City']) && isset($_POST['District']) && isset($_POST['Population'])) {

        $consulta = "INSERT INTO city (Name,CountryCode,District,Population) VALUES ('".$_POST['City']."','".$_POST['CountryCode']."','".$_POST['District']."',".$_POST['Population'].")";
    }
    $consulta = "SELECT Code,Name FROM country;";
    $resultat = mysqli_query($conn, $consulta);
    if (!$resultat) {
        $message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
        $message .= 'Consulta realitzada: ' . $consulta;
        die($message);
    }
    ?>
    <h1>Nueva Ciudad</h1>

    <form method="post" action="Nueva_Ciudad.php">

    <select name="CountryCode" required>
    <?php

    echo "<option disabled selected value> -- Selecciona un païs -- </option>";

    mysqli_data_seek($resultat, 0);

    while ($registre = mysqli_fetch_assoc($resultat)) {

        echo "<option value=\"".$registre['Code']."\">".$registre['Name']."</option>\n";
    }

    ?>
    </select>

    <input type="text" name="City" placeholder="Ciudad" required>
    <input type="text" name="District" placeholder="Distrito"required>
    <input type="number" name="Population" placeholder="Poblacion" required>
    <input id="enlace" type="Submit" value="Afegir ciutat">

    </form>

    <div id="Contenedor">
        <a href="Coneccion.php" id="enlace">Nueva Ciudad</a>
    </div>
</body>

</html>