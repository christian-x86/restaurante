<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="admin_plato_editar.php" method="post">
    <?php
    include("conexion.php");

    $sql = "SELECT id_plato, nombre, descripcion, id_seccion FROM plato WHERE id_plato=".$_POST["id_plato"].";";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "
          <label for='id_plato'>id_plato: </label><input value='".$row["id_plato"]."' name='id_plato' id='id_plato'>
          <label for='nombre'>Nombre: </label><input value='".$row["nombre"]."' name='nombre'  id='nombre'>
          <label for='descripcion'>Dscripción: </label><input value='".$row["descripcion"]."' name='descripcion'  id='descripcion'>";
          // asignamos la seccion a una variable para usarla en el select
          $seccion1=$row["id_seccion"];
        }
      } else {
        echo "0 results";
      }
      $conn->close();
    ?>

    <select name="id_seccion" id="id_seccion">
    <?php
    include("conexion.php");
    $sql1 = "SELECT id_seccion, nombre FROM seccion";
    $result = $conn->query($sql1);

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
    $conn->close();
    ?>
    </select>
    <input type="submit" value="Enviar">
  </form>
</body>
</html>