<?php require_once('header.php');

include("conexion.php");

$sql = "SELECT id_carta, nombre FROM carta";
$result = $conn->query($sql);
?>

<form action="" method="post" id="form_carta" class="form-group">
  <div class="form-group row">
    <div class="col-md-4">
      <select name="carta" id="carta" class="form-select">
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
    </div>
    <div class="col-md-5">
      <select name="id_seccion" id="id_seccion" class="form-select">
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
    </div>
    <div class="col-md-3">
      <input type="submit" class="btn btn-primary form-control" value="Enviar">
    </div>
  </div>
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
      echo "<hr><h2>".$row["Carta"]."</h2>";
    }
    
    if (!in_array($row["Sección"], $arrSeccion)) {
      array_push($arrSeccion, $row["Sección"]);
      echo "<hr><h3>".$row["Sección"]."</h3>";
    }

    if (!in_array($row["id_plato"], $arrPlato)) {
      array_push($arrPlato, $row["id_plato"]);
      echo "<br><div class='row'><h4 class='col-6 col-sm-9 col-md-9 col-lg-10'>".$row["Nombre del plato"]."</h4>
      <form action='admin_plato_form_editar_lc.php' method='post' class='col-6 col-sm-3 col-md-3 col-lg-2 form-group'>
        <input type='hidden' name='id_plato' value=".$row['id_plato'].">
        <input type='hidden' name='id_seccion' value=".$row['id_seccion'].">
        <button type='submit' class='btn btn-primary form-control'><i class='bi bi-pencil'></i> Editar</button>

      </form>
      </div>";
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

require_once('header.php'); ?>