<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .form-group{
            max-width: 30em;
            margin: auto;
        }
    </style>
</head>
<body>
    <form action="" method="post" class="form-group">
        <label for="title" >Título: </label>
        <input type="text" name="title" id="title" required class="form-control">
        <label for="rating">Calificación: </label>
        <select name="rating" id="rating" class="form-control form-select">
            <option value="PG">PG</option>
            <option value="G">G</option>
            <option value="PG-13">PG-13</option>
            <option value="NC-17">NC-17</option>
        </select>
        <label for="money">Recaudación: </label>
        <input type="number" name="money" id="money" class="form-control">
        <input type="submit" value="Enviar" class="btn btn-secondary">
    </form>
    <?php
    if ($_POST) {
        $title=$_POST["title"];
        $rating=$_POST["rating"];
        $money=$_POST["money"];
    
    
    include('conexion.php');
    $sql="INSERT INTO movies (Title, Rating, Money) VALUES ('$title', '$rating', '$money');";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // header('Location: index.php');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
    }
    ?>
</body>
</html>