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
  include("conexion.php");
  
  $sql = "SELECT id_carta, nombre FROM carta";
  $result = $conn->query($sql);
  ?>

  <form action="" method="post" id="form_carta">
    <select name="carta" id="carta">
      <option value="0" id="select">Selecciona carta</option>

      <?php
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<option value='".$row["id_carta"]."' id='select'>".$row["nombre"]."</option>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>

    </select>

    <select name="seccion" id="seccion">
      <option value="0" id="select">Selecciona sección</option>
      <?php
      include("conexion.php");
      $sql1 = "SELECT id_seccion, nombre FROM seccion";
      $result = $conn->query($sql1);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<option value='".$row["id_seccion"]."' id='select'>".$row["nombre"]."</option>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>

    </select>

    <input type="submit" value="Enviar">
  </form>

  <?php
  include("conexion.php");

  $condicion="";

  if ($_POST) {
    if ($_POST["carta"]==0 && $_POST["seccion"]==0) {
      $condicion="";
    }elseif ($_POST["carta"]==0) {
      $condicion="WHERE seccion.id_seccion=".$_POST["seccion"];
    }elseif ($_POST["seccion"]==0) {
      $condicion="WHERE carta.id_carta=".$_POST["carta"];
    }else {
      $condicion="WHERE carta.id_carta=".$_POST["carta"]." AND seccion.id_seccion=".$_POST["seccion"];
    }
  }

    $sql2 = "SELECT carta.nombre AS `Carta`, seccion.nombre AS `Sección`, plato.id_plato, plato.nombre AS `Nombre del plato`, formato.nombre AS `Formato`, lineas_carta.precio
    FROM carta
    JOIN seccion ON carta.id_carta = seccion.id_carta
    JOIN plato_seccion ON seccion.id_seccion = plato_seccion.id_seccion
    JOIN plato ON plato_seccion.id_plato=plato.id_plato
    JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato
    JOIN formato ON lineas_carta.id_formato=formato.id_formato
    ".$condicion."
    ORDER BY carta.id_carta, seccion.id_seccion, plato.nombre, formato.id_formato;";

  $result = $conn->query($sql2);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      // var_dump($row);
        foreach ($row as $key => $value) {
          echo $key.": ".$value;
          echo "<br>";
        }
        echo "<br>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();
  ?>
</body>
</html>