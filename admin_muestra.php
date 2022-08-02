

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Admin</title>
</head>
<body>
  <h1></h1>
  <table>
    <tr>
      <td>
        
      </td>
    </tr>
  </table>

  <?php
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
  $arr=[];
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $arr+= [$row["id_carta"]=>$row["nombre"]];
    }
  } else {
    echo "0 results";
  }
  $conn->close();

  
  ?>

  <pre>
  <?php var_dump($arr); ?>
  </pre>
  <form action="" method="post">
    <select name="carta" id="carta">
      <option value=""></option>
    </select>
  </form>
</body>
</html>