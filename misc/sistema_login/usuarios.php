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
    include('conexion.php');
    $sql="SELECT * FROM usuario;";
    $result=$conn->query($sql);

    $result->fetch_assoc();

    // lo recorremos
    // echo "<pre>";
    // foreach ($result as $key => $value) {
    //     var_dump($value);
        
    // }
    // echo "</pre>";

    // El array es $value
    foreach ($result as $key => $value) {
        echo "Email: ".$value["email"]."<br>";
        echo "Password: ".$value["password"]."<br>";
        echo "Verificador: ".$value["verificador"]."<br>";
        echo "Activo: ".$value["activo"]."<br>";
        echo "<hr>";
    }


    $sql="SELECT COUNT(*) AS totalusuarios FROM usuario;";
    $result=$conn->query($sql);
    $result->fetch_assoc();
    
    foreach ($result as $key => $value) {
        echo "total: ".$value["totalusuarios"]."<br>";
        echo "<hr>";
    }
    $conn->close();
    ?>
</body>
</html>