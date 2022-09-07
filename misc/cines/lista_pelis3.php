<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
    <style>
      .table{
        max-width: 70%;
        margin: auto;
      }
    </style>
</head>
<body>

  <form action="" method="post">
    <input type="hidden" name="a" value="1">
    <input type="submit" value="a">
  </form>
  <form action="" method="post">
    <input type="hidden" name="a" value="0">
    <input type="submit" value="b">
  </form>
  <?php

  include("conexion.php");
  if ($_POST["a"]==1) {
    $b=true;
  }else {
    $b=false;
  }
  if ($b) {
    $condicion="LEFT JOIN movietheaters ON movies.Code=movietheaters.movie";
  }else{
    $condicion="";
  }
  $sql = "SELECT * FROM movies $condicion;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    ?>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Titulo</th>
          <th scope="col">Rating</th>
          <th scope="col">Money</th>
          <?php
          if ($b) {
            echo "<th scope='col'>Sala de cine</th>";
          }
          ?>
        </tr>
      </thead>
      <tbody>
    <?php
    while ($row = $result->fetch_assoc()) {
      echo "
        <tr>
          <td>".$row["Title"]."</td>
          <td>".$row["Rating"]."</td>
          <td>".$row["Money"]."</td>";
          if ($b) {
            echo "<td>".$row["Name"]."</td>";
          }
      echo "</tr>";
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