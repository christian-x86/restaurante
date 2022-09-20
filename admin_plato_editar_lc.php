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
      echo "<pre>";
      var_dump($_POST);
      echo "</pre>";

      include("conexion.php");

      // $sql = "UPDATE plato SET nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."', id_seccion='".$_POST["id_seccion"]."' WHERE id_plato=".$_POST["id_plato"].";";
      // $sql = "UPDATE lineas_carta SET id_formato='', precio='' WHERE id_lineas_carta='';";
      for ($i=0; $i < count($_POST["formato"]); $i++) { 

        $sql = "UPDATE plato SET nombre='".$_POST["nombre"]."', descripcion='".$_POST["descripcion"]."', id_seccion='".$_POST["id_seccion"]."' WHERE id_plato=".$_POST["id_plato"].";";

        // if ($conn->query($sql) === TRUE) {
        //   echo "Record updated successfully";
        // } else {
        //   echo "Error updating record: " . $conn->error;
        // }
        echo "<br>";
        echo $_POST["formato"][$i];
        echo "<br>";
        echo $_POST["precio"][$i];
        echo "<br>";
      }

      // echo $sql;

      // if ($conn->query($sql) === TRUE) {
      //   echo "Record updated successfully";
      // } else {
      //   echo "Error updating record: " . $conn->error;
      // }
      
      $conn->close();
    }
    ?>
</body>
</html>