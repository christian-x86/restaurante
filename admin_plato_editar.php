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

    if ($_POST) {
      
      include("conexion.php");

      $sql = "UPDATE plato SET nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."' WHERE id_plato=".$_POST["id_plato"].";";
      
      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
      
      $conn->close();
    }
    ?>
</body>
</html>