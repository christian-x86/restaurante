<?php

// metodo prepared statement

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurante";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id=1;

// $sql = "SELECT * FROM carta WHERE id_carta=?"; // SQL with parameters
$sql = "SELECT * FROM carta WHERE id_carta BETWEEN ? AND 4"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
// $user = $result->fetch_assoc(); // fetch data (si es un solo registro)
// var_dump($user);
  echo "<pre>";
  while($row = $result->fetch_assoc()) {
    echo var_dump($row);
  }
  echo "</pre>";

$conn->close();
?>