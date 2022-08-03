

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Admin</title>
</head>
<body>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "restaurante2";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT id_carta, nombre FROM carta";
  /*
  $sql = "SELECT carta.nombre AS `Carta`, seccion.nombre AS `Sección`, plato.nombre AS `Nombre del plato`, formato.nombre AS `Formato`, lineas_carta.precio
  FROM carta
  JOIN seccion ON carta.id_carta = seccion.id_carta
  JOIN plato_seccion ON seccion.id_seccion = plato_seccion.id_seccion
  JOIN plato ON plato_seccion.id_plato=plato.id_plato
  JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato
  JOIN formato ON lineas_carta.id_formato=formato.id_formato
  ORDER BY carta.id_carta, seccion.id_seccion, plato.nombre, formato.id_formato;";
  */
  $result = $conn->query($sql);
  $arr=[];


?>
<form action="" method="post" id="form_carta">
  <select name="carta" id="carta">

    <?php
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        // array_push($arr, $row);
        echo "<option value='".$row["id_carta"]."' id='select'>".$row["nombre"]."</option>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();

    
    ?>
  </select>
</form>
</body>
</html>