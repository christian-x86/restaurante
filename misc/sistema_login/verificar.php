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

    $email=$_GET['email'];
    $verificador=$_GET['verificador'];

    include('conexion.php');
    $sql="SELECT * FROM usuario WHERE email='".$email."' AND verificador='".$verificador."' ;";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    
    if ($result->num_rows > 0) {
        echo "Se ha encontrado en la bd<br>";
        if ($row["activo"]==0) {
            $sql1="UPDATE usuario SET activo=1 WHERE email='".$email."';";
            if ($conn->query($sql1) === TRUE) {
                echo "New record created successfully<br><a href='login.php'>Ir al login</a>";
            } else {
                echo "Error: " . $sql1 . "<br>" . $conn->error;
            }
        }else {
            echo "Ya está activo<br><a href='login.php'>Ir al login</a>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?> 
    
</body>
</html>