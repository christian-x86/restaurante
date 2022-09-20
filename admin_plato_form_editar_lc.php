<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="admin_plato_editar_lc.php" method="post">
    <?php
    include("conexion.php");

    $sql = "SELECT plato.id_plato, plato.nombre, plato.descripcion, plato.id_seccion, formato.id_formato, formato.nombre AS 'Formato', precio, id_lineas_carta
    FROM plato JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato JOIN formato ON lineas_carta.id_formato=formato.id_formato
    WHERE plato.id_plato=".$_POST["id_plato"].";";

    $result = $conn->query($sql);

    $arrFormato=[];
    // bool para ver si se ya esta impreso el plato
    $impreso=false;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          if (!$impreso) {
            echo "
            <br>
            <label for='id_plato'>id_plato: </label><input type='text' value='".$row["id_plato"]."' name='id_plato' id='id_plato'>
            <label for='nombre'>Nombre: </label><input type='text' value='".$row["nombre"]."' name='nombre'  id='nombre'>
            <label for='descripcion'>Descripción: </label><input value='".$row["descripcion"]."' name='descripcion'  id='descripcion'>";
            $impreso=true;
          }
          // asignamos la seccion a una variable para usarla en el select
          $seccion1=$row["id_seccion"];
          // lista de formatos para ese plato
          $arrFormato[] = ["id_formato"=>$row["id_formato"], "precio"=>$row["precio"], "id_lineas_carta"=>$row["id_lineas_carta"]];
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      // echo "<pre>";
      // var_dump($arrFormato);
      // echo "</pre>";
    ?>
    <select name="id_seccion" id="id_seccion">
    <?php
    include("conexion.php");
    $sql = "SELECT id_seccion, nombre FROM seccion";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if ($seccion1==$row["id_seccion"]) {
          echo "<option value='".$row["id_seccion"]."' selected>".$row["nombre"]."</option>";
        }else{
          echo "<option value='".$row["id_seccion"]."'>".$row["nombre"]."</option>";
        }
      }
    } else {
      echo "0 results";
    }

    ?>
    </select>
    <br>
    <?php


      $sql = "SELECT * FROM formato;";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          // lista de todos los formatos
          $arrFormatos[] = ["id_formato"=>$row["id_formato"], "nombre"=>$row["nombre"]];
      } 
      }else {
        echo "0 results";
      }
      // echo "<pre>";
      // var_dump($arrFormatos);
      // echo "</pre>";
      $conn->close();
      // contador para cambiar el nombre a los formatos (formato1, formato2, ...)
      $cont=0;
      foreach ($arrFormato as $value1) {
        echo "<select name='formato[".$cont."]' id='formato'>";
        
        foreach ($arrFormatos as $value2) {
          ?>
          <option value='<?php echo $value2["id_formato"]; ?>' <?php if($value1["id_formato"]==$value2["id_formato"]){echo "selected";} ?>><?php echo $value2["nombre"]; ?></option>
          <?php
        }
        echo "</select>";
        echo "<input type='number' step='0.01' name='precio[".$cont."]' id='precio' value='".$value1["precio"]."'>";
        echo "<input type='hidden' name='id_lineas_carta[".$cont."]' value='".$value1["id_lineas_carta"]."'>";
        echo "<br>";
        $cont++;
      }

    ?>
    <input type="submit" value="Enviar">
  </form>

</body>
</html>