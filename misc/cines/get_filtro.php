<?php
include("conexion.php");

$sql="SELECT * FROM movies WHERE Title LIKE '%".$_GET['q']."%'
ORDER BY CASE
  WHEN Title LIKE '".$_GET['q']."' THEN 1
  WHEN Title LIKE '".$_GET['q']."%' THEN 2
  WHEN Title LIKE '%".$_GET['q']."' THEN 4
  ELSE 3
END;";

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