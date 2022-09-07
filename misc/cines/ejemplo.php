<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

  <?php

  include("conexion.php");
  $sql = "SELECT * FROM movies;";
  $result = $conn->query($sql);
  // [] lo guarda en un array 
  if ($result->num_rows > 0) {
    echo "<pre>";
    while ($row[] = $result->fetch_assoc()) {
      
    }
    var_dump($row);
    echo "</pre>";
  } else {
    echo "0 results";
  }
  
  $conn->close();

  ?>
  
</body>
</html>