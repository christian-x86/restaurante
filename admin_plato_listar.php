<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
  include("conexion.php");

  $sql = "SELECT * FROM plato;";

  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      // var_dump($row);
        foreach ($row as $key => $value) {
          echo $key.": ".$value;
          echo "<br>";
        }
        echo "
        <form action='admin_plato_form_editar.php' method='post'>
          <input type='hidden' name='id_plato' value=".$row['id_plato'].">
          <input type='hidden' name='id_seccion' value=".$row['id_seccion'].">
          <input type='submit' value='Editar'>
        </form>
        <br>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();
  ?>
</body>
</html>