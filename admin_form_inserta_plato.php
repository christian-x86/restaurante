<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Admin. Plato</title>
</head>
<body>
  <form action="admin_inserta_plato.php" method="post">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nomber">
    <label for="descripcion">Descripción: </label>
    <input type="text" name="descripcion" id="descripcion">

    <label for="nombre">Sección: </label>
    <select name="seccion">
      <option value="0" id="select">Selecciona sección</option>
      <?php
      include("conexion.php");
      $sql1 = "SELECT id_seccion, nombre FROM seccion";
      $result = $conn->query($sql1);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<option value='".$row["id_seccion"]."' >".$row["nombre"]."</option>";
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