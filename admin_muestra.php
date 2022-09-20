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

    <select name="id_seccion" id="id_seccion">
      <option value="0" >Selecciona sección</option>
      <?php
      include("conexion.php");
      $sql1 = "SELECT id_seccion, nombre FROM seccion";
      $result = $conn->query($sql1);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<option value='".$row["id_seccion"]."'>".$row["nombre"]."</option>";
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
    if ($_POST["carta"]==0 && $_POST["id_seccion"]==0) {
      $condicion="";
    }elseif ($_POST["carta"]==0) {
      $condicion="WHERE seccion.id_seccion=".$_POST["id_seccion"];
    }elseif ($_POST["id_seccion"]==0) {
      $condicion="WHERE carta.id_carta=".$_POST["carta"];
    }else {
      $condicion="WHERE carta.id_carta=".$_POST["carta"]." AND seccion.id_seccion=".$_POST["id_seccion"];
    }
  }

    $sql2 = "SELECT carta.nombre AS `Carta`, seccion.id_seccion, seccion.nombre AS `Sección`, plato.id_plato, plato.nombre AS `Nombre del plato`, formato.id_formato, formato.nombre AS `Formato`, lineas_carta.precio
    FROM carta
    JOIN carta_seccion ON carta.id_carta = carta_seccion.id_carta
    JOIN seccion ON carta_seccion.id_seccion = seccion.id_seccion
    JOIN plato ON seccion.id_seccion=plato.id_seccion
    JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato
    JOIN formato ON lineas_carta.id_formato=formato.id_formato
    ".$condicion."
    ORDER BY carta.id_carta, seccion.id_seccion, plato.nombre, formato.id_formato;";

  $result = $conn->query($sql2);

  $arrCarta = [];
  $arrSeccion = [];
  $arrPlato = [];

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      if (!in_array($row["Carta"], $arrCarta)) {
        array_push($arrCarta, $row["Carta"]);
        echo "<h1>".$row["Carta"]."</h1>";
      }
      
      if (!in_array($row["Sección"], $arrSeccion)) {
        array_push($arrSeccion, $row["Sección"]);
        echo "<h2>".$row["Sección"]."</h2>";
      }

      if (!in_array($row["id_plato"], $arrPlato)) {
        array_push($arrPlato, $row["id_plato"]);
        echo "<h3>".$row["id_plato"]." | ".$row["Nombre del plato"]."</h3>
        <form action='admin_plato_form_editar_lc.php' method='post'>
          <input type='hidden' name='id_plato' value=".$row['id_plato'].">
          <input type='hidden' name='id_seccion' value=".$row['id_seccion'].">
          <input type='submit' value='Editar'>
        </form>";
        echo $row["id_formato"]." | ".$row["Formato"].": ".$row["precio"]." €";
        echo "<br>";
      }else{
        echo $row["id_formato"]." | ".$row["Formato"].": ".$row["precio"]." €";
        echo "<br>";
      }
    }
  } else {
    echo "0 results";
  }
  $conn->close();
  ?>
</body>
</html>