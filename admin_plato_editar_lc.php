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

      $sql = "SELECT * FROM plato WHERE id_plato=".$_POST["id_plato"].";";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
      }
      // comprobamos si se ha dejado sin cambiar los campos nombre, descripcion y  seccion
      if (!($_POST["nombre"] == $row["nombre"] && $_POST["descripcion"] == $row["descripcion"] && $_POST["id_seccion"] == $row["id_seccion"])) {

        $sql = "UPDATE plato SET nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."', id_seccion='".$_POST["id_seccion"]."' WHERE id_plato=".$_POST["id_plato"].";";
        // ejecutamos el update
        if ($conn->query($sql) === TRUE) {
          echo "Datos del plato actualizados satisfactoriamente";
          echo "<br>";
        } else {
          echo "Error updating record: " . $conn->error;
          echo "<br>";
        }
      }

      for ($i=0; $i < count($_POST["id_lineas_carta"]); $i++) {

        $sql = "SELECT * FROM lineas_carta WHERE id_lineas_carta=".$_POST["id_lineas_carta"][$i].";";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            // vemos si se ha dejado sin editar el select de formato o el precio
            if (!($_POST["id_lineas_carta"][$i]==$row["id_lineas_carta"] && $_POST["formato"][$i]==$row["id_formato"] && $_POST["precio"][$i]==$row["precio"])) {

              $sql = "UPDATE lineas_carta SET id_formato='".$_POST["formato"][$i]."', precio='".$_POST["precio"][$i]."' WHERE id_lineas_carta=".$_POST["id_lineas_carta"][$i].";";
              // ejecutamos el update
              if ($conn->query($sql) === TRUE) {
                echo "Datos de la línea de carta actualizados satisfactoriamente";
                echo "<br>";
              } else {
                echo "Error updating record: " . $conn->error;
                echo "<br>";
              }
              
            }
          }
        }
      }
      
      $conn->close();
    }
    ?>
</body>
</html>