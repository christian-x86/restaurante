<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Registro</h3>
    <form action="" method="post">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" required>
        <label for="pass">Contraseña: </label>
        <input type="password" name="pass" id="pass" required>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_POST) {
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        include("conexion.php");
        $sql = "SELECT * FROM usuario WHERE email='".$email."';";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            echo "Ya existe ese usuario";
        } else {
          $hash= md5(rand(0,10));
          
          $sql1="INSERT INTO usuario (email, password, verificador, activo) VALUES ('".$email."', '".$pass."', '".$hash."', false);";

          if ($conn->query($sql1) === TRUE) {
            echo "New record created successfully";
            ?>
            <form action="verificar.php" method="get">
              <input type="hidden" name="email" value="<?php echo $email; ?>">
              <input type="hidden" name="verificador" value="<?php echo $hash; ?>">
              <input type="submit" value="Verificar">
            </form>
          <?php
          } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
          }
        }
        
        $conn->close();
    }

    ?>

</body>
</html>