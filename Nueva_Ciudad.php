<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            font-size: 20px;
        }
    </style>
    <title>Nueva Ciudad</title>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost','adrian','Hakantor');
    mysqli_select_db($conn, 'world');

    $insert = "INSERT INTO city VALUES (null, '$_POST[city_name]', '$_POST[country_name]', '$_POST[district]', $_POST[population]);";
    $res = mysqli_query($conn, $insert);
    if (mysqli_query($conn, $insert)) {
        echo "<p>Ciudad añadida correctamente</p>";
    } else {
        echo "<p>Ciudad no añadida</p>";
        echo mysqli_error($conn);
    }
    }
    ?>

    <?php
    $consulta = "SELECT name, code FROM country;";
    $resultat = mysqli_query($conn, $consulta);
    if (!$resultat) {
        $msg = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
        $msg .= 'Consulta realitzada: ' . $consulta;
        die($msg);
    }
    ?>
    <h1 align="center">Nueva Ciudad</h1>

    <form align="center" action="" method="post">
        <label for="Pais">Pais: </label>
        <select name="country_name" id="Pais">
            <?php while ($row = mysqli_fetch_assoc($resultat)) { ?>
                <option value="<?= $row["code"] ?>"><?= $row["name"] ?></option>
            <?php } ?>
        </select>
        <br><br>
        <label for="Ciudad">Ciudad: </label>
        <input type="text" name="city_name" id="Ciudad" required>
        <br><br>
        <label for="Distrito">Distrito: </label>
        <input  type="text" name="district" id="Distrito" required>
        <br><br>
        <label for="Poblacion">Poblacion: </label>
        <input type="number" name="population" id="Poblacion" required>
        <br><br>
        <input id="enlace" type="submit" value="Seleccionar">
    </form>
     <div id="Contenedor">
        <a href="Coneccion.php" id="enlace">Seleccionar Pais</a>
    </div>
</body>

</html>