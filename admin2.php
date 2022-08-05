<?php

//Metodo normal

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

$sql = "SELECT id_carta, nombre FROM carta";
$result = $conn->query($sql);

// lo mete en un array asociativo
/*
$resultado=$result->fetch_assoc();
var_dump($resultado);
*/

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id_carta"]. " - Name: " . $row["nombre"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>