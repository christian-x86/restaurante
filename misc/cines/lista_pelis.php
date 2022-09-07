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
  <a href="add_movie.php" type="button" class="btn btn-secondary">Añadir pelicula</a>
  <?php

  include("conexion.php");
  $sql = "SELECT * FROM movies;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    ?>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Titulo</th>
          <th scope="col">Rating</th>
          <th scope="col">Money</th>
        </tr>
      </thead>
      <tbody>
    <?php
    while ($row = $result->fetch_assoc()) {
      echo "
        <tr>
          <td>".$row["Title"]."</td>
          <td>".$row["Rating"]."</td>
          <td>".$row["Money"]."</td>
        </tr>
      ";
    }
    ?>
      </tbody>
    </table>
    <?php
  } else {
    echo "0 results";
  }
  
  $conn->close();

  ?>

</body>
</html>