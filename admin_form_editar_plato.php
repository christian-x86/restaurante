<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    var_dump($_POST);
    ?>
    <form action="admin_editar_plato.php" method="post">
    <?php
    include("conexion.php");
  
    $sql = "SELECT id_plato, nombre, descripcion FROM plato WHERE id_plato=".$_POST["id_plato"].";";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<input value='".$row["id_plato"]."' name='id_plato' id='id_plato'>";
          echo "<input value='".$row["nombre"]."' name='nombre'  id='nombre'>";
          echo "<input value='".$row["descripcion"]."' name='descripcion'  id='descripcion'>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
    ?>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>