<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Login</h3>
    <form action="" method="post">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" required>
        <label for="pass">Contraseña: </label>
        <input type="password" name="pass" id="pass" required>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if ($_POST) {
        $email=$_POST['email'];
        $pass=$_POST['pass'];

        include('conexion.php');
        $sql= "SELECT * FROM usuario WHERE email='".$email."' AND password='".$pass."' ;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "Existe ese usuario";
            $_SESSION["email"]=$email;

        } else {
            echo "Conntraseña incorrecta / Usuario no activado / No existe ese usuario";
        }
        $conn->close();
    }
    ?>
</body>
</html>