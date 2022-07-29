<?php

// metodo prepared statement

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

$id=1;

$sql = "SELECT * FROM carta WHERE id_carta=?"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$user = $result->fetch_assoc(); // fetch data 
var_dump($user);  
?>