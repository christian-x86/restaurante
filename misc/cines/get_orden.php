<?php
include("conexion.php");
$sql = "SELECT * FROM movies ORDER BY ".$_GET['campo']." ".$_GET['orden'].";";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {
    echo "
      <tr>
        <td>".$row["Title"]."</td>
        <td>".$row["Rating"]."</td>
        <td>".$row["Money"]."</td>
      </tr>
    ";
  }

} else {
  echo "0 results";
}

$conn->close();

?>