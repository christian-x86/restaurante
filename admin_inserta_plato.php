<?php
require_once('header.php');
include('conexion.php');

$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];
$seccion=$_POST["seccion"];

$sql = "INSERT INTO plato (nombre, descripcion, id_seccion) VALUES (?, ?, ?)"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ssi", $nombre, $descripcion, $seccion);

$se=$stmt->execute();

?>
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
<?php

      if (false===$se) {
        die("execute() failed: ". htmlspecialchars($stmt->error));
      }else{
        echo "<p>New record created successfully.</p>";
        // última id insertada
        $sql1= "SELECT LAST_INSERT_ID();";
        $result = $conn->query($sql1);
        $row = $result -> fetch_all(MYSQLI_ASSOC);
        $id_plato = $row[0]["LAST_INSERT_ID()"];
        echo "<a href='admin_lc_form_insertar.php?id_plato=".$id_plato."' class='btn btn-primary'>Nuevo formato</a>";
        $stmt->close();
      }
      ?>

    </div>
    <div class="col-md-2"></div>
  </div>
</div>
</body>
</html>