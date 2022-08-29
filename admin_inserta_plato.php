<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurante2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];

$sql = "INSERT INTO plato (nombre, descripcion) VALUES (?, ?)"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("ss", $nombre, $descripcion);

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