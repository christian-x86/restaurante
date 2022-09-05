<?php
include('conexion.php');

$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];
$seccion=$_POST["seccion"];

$sql = "INSERT INTO plato (nombre, descripcion, id_seccion) VALUES (?, ?, ?)"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ssi", $nombre, $descripcion, $seccion);

$se=$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin. Inserta Plato</title>
</head>
<body>
    <p>
      <?php
      if (false===$se) {
        die("execute() failed: ". htmlspecialchars($stmt->error));
      }else{
        echo "New record created  successfully.";
      }
      
      $stmt->close();
      ?>
    </p>
</body>
</html>