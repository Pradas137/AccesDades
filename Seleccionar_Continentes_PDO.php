<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Buscar paises</title>
  </head>

  <style type="text/css">
    body{
      background: #00FFFF;
    }
    
    table.pos_fixed1 { 
      display: inline-block; 
      margin-top:0%; 
      margin-left:30%;
      width: 260px; height: 100px; 
    }

    table.pos_fixed2 { 
      display: inline-block; 
      margin-top:0%; 
      margin-left:10%;
      width: 260px; height: 100px; }

    table,td{
      border: 1px solid yellow;
      border-spacing: 0px;
      font-size: 25px;
      width: 260px; height: 100px;
      text-align: center;
      background: #0000a4;
      color: white;
    }

    th{
      border: 1px solid yellow;
      border-spacing: 0px;
      font-size: 25px;
      width: 260px; height: 100px;
      text-align: center;
      background-color: #0000a4;
      color: yellow;
    }
  </style>

  <body>
    <h1 align="center">Exemple de lectura de dades a MySQL Y PDO</h1>
    <?php
      try {
        $hostname = "localhost";
        $dbname = "world";
        $username = "adrian";
        $pw = "Hakantor";
        $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
      } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
      }
    ?>
    <form align="center" method="GET">
      <select id="selector" align="center" name='continent'>"
        <?php
          $consulta = $pdo->prepare("select distinct continent FROM country;");
          $consulta -> execute();
          $row = $consulta -> fetch();
          while ($row) {
             echo "<option value='".$row['continent']."'>".$row['continent']."</option>";
             $row = $consulta -> fetch();
          }
          unset($consulta);
        ?>

      </select>
      <input id="enlace" type="submit" value="Seleccion"></input>
    </form><br><br>
    <div id="formato">
    <?php
        if ((isset($_GET['continent']))){
            $select = $_GET['continent'];
            if (isset($select)){
              $totalPoblacion = 0;
              $consulta = $pdo->prepare("SELECT name,continent,population FROM country Where continent='".$select."';");
              $consulta->execute();
              $fila = $consulta->fetch();
              echo "<table width='10%' class='pos_fixed1'>";
              echo "<th id='Nombre'>Name</th>";
              echo "<th id='Poblacion'>Population</th>";

               while($fila)
              {
                echo "<tr>";
                echo "<td>".$fila['name']."</td>";
                echo "<td>".$fila['population']."</td>";
                $totalPoblacion += $fila['population'];
                echo "</tr>";
                $fila = $consulta->fetch();
              }

              echo "</table>";
              echo "<table width='10%' class='pos_fixed2'>";
              echo "<th id='totalPoblacion'>Total Poblacion</th>";
              echo "<tr>";
              echo "<td>$totalPoblacion</td>";
              echo "</tr>";
              unset($consulta);
            }
        }
      ?>
  </body>
</html>