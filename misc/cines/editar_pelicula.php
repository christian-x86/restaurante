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
    <?php
    include('conexion.php');
    $sql="SELECT * FROM movies WHERE Code=".$_GET["id"].";";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    ?>
    <form action="" method="post" class="form-group">
        <label for="title" >Título: </label>
        <input type="text" name="title" id="title" required class="form-control" value="<?php echo $row["Title"] ?>">
        <label for="rating">Calificación: </label>
        <select name="rating" id="rating" class="form-control form-select">
            <option value="PG" <?php if($row["Rating"]=="PG"){echo "selected";} ?>>PG</option>
            <option value="G" <?php if($row["Rating"]=="G"){echo "selected";} ?>>G</option>
            <option value="PG-13" <?php if($row["Rating"]=="PG-13"){echo "selected";} ?>>PG-13</option>
            <option value="NC-17" <?php if($row["Rating"]=="NC-17"){echo "selected";} ?>>NC-17</option>
        </select>
        <label for="money">Recaudación: </label>
        <input type="number" name="money" id="money" class="form-control" value="<?php echo $row["Money"] ?>">
        <input type="submit" value="Enviar" class="btn btn-secondary">
    </form>
    <?php
    if ($_POST) {
        $title=$_POST["title"];
        $rating=$_POST["rating"];
        $money=$_POST["money"];
    
        $sql="UPDATE movies SET Title='$title', Rating='$rating', Money='$money' WHERE Code=".$_GET["id"].";";
        
        if ($conn->query($sql) === TRUE) {
            echo "Success";
            header("refresh:5 index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    ?>
</body>
</html>