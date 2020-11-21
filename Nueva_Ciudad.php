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

     if (isset($_POST['CodigoPais']) && isset($_POST['Ciudad']) && isset($_POST['Distrito']) && isset($_POST['Poblacion'])) {

        $consulta = "INSERT INTO city (Name,CountryCode,District,Population) VALUES ('".$_POST['Ciudad']."','".$_POST['CodigoPais']."','".$_POST['Distrito']."',".$_POST['Poblacion'].")";
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

    <select name="CodigoPais" required>
    <?php
    mysqli_data_seek($resultat, 0);

    while ($registre = mysqli_fetch_assoc($resultat)) {

        echo "<option value=\"".$registre['Code']."\">".$registre['Name']."</option>\n";
    }

    ?>
    </select>

    <input type="text" name="Ciudad" placeholder="Ciudad" required>
    <input type="text" name="Distrito" placeholder="Distrito"required>
    <input type="number" name="Poblacion" placeholder="Poblacion" required>
    <input id="enlace" type="Submit" value="Añadir ciudad">

    </form>

    <div id="Contenedor">
        <a href="Coneccion.php" id="enlace">Seleccionar Paises</a>
    </div>
</body>

</html>