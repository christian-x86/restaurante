<?php

//Metodo normal

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

// consulta
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

?>

<?php
// insert
$field1=1;
$field2="carta1";
$sql1="INSERT INTO carta (id_carta, nombre) VALUES ('".$field1."', '".$field2."');";

if ($conn->query($sql1) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}
$conn->close();
?>