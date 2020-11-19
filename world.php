<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <head>
  <title>Exemple de lectura de dades a MySQL</title>
  <style>
    body{
    }
    table,td {
      border: 1px solid black;
      border-spacing: 0px;
    }
  </style>
 </head>
  <body>
    <h1>Seleccionar Paises</h1>
    <form action="world.php" method="post">
      
      <select id="despleg" name="country">
        <?php
          $conn = mysqli_connect('localhost','quin','P@ssw0rd');
          
          mysqli_select_db($conn, 'world');
          
          $query = "SELECT name, code FROM country;";
          
          $result = mysqli_query($conn, $query);
          
          if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "<option>".$row['name']."</option>";
            }
          }
         ?>
      </select>

      <input type="submit" name="send" value="Seleccionar">

    </form>

    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["country"])) {
        
        $conn = mysqli_connect('localhost','quin','P@ssw0rd');

        mysqli_select_db($conn, 'world');

        $query = "select c.Name, ct.Name, c.Code from country c, city ct where c.Code = ct.CountryCode and c.Name = '".$_POST['country']."';";

        $result = mysqli_query($conn, $query);

        if ($result) {
          while($row = mysqli_fetch_assoc($result)) {
            echo "<p>".$row['Name']."</p>";
          }
        }
      }
     ?>
  </body>
</html>