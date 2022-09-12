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
  <input type="text" name="filtro" id="filtro" onkeyup="filtrar();" placeholder="Buscar">
  <?php

  include("conexion.php");
  $sql = "SELECT * FROM movies;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    ?>
    <table class="table table-striped table-hover" >
      <thead>
        <tr>
          <th id="titulo" scope="col" onclick="reordenar('Title');" data-titulo="ASC">Titulo</th>
          <th id="rating" scope="col" onclick="reordenar('Rating');" data-rating="ASC">Rating</th>
          <th id="money" scope="col" onclick="reordenar('Money');" data-money="ASC">Money</th>
        </tr>
      </thead>
      <tbody id="txtHint">
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
<script>

  function reordenar(campo) {
    
    switch (campo) {
      case 'Title':
        var orden=document.getElementById('titulo').dataset.titulo;
        break;
      case 'Rating':
        var orden=document.getElementById('rating').dataset.rating;
        break;
      case 'Money':
        var orden=document.getElementById('money').dataset.money;
        break;
      default:
        break;
    }

    if (orden == "ASC") {
      new_orden ="DESC";
    }else{
      new_orden="ASC";
    }

    switch (campo) {
      case 'Title':
        document.getElementById('titulo').dataset.titulo = new_orden;
        document.getElementById('rating').dataset.rating = "ASC";
        document.getElementById('money').dataset.money = "ASC";
        break;
      case 'Rating':
        document.getElementById('rating').dataset.rating = new_orden;
        document.getElementById('titulo').dataset.titulo = "ASC";
        document.getElementById('money').dataset.money = "ASC";
        break;
      case 'Money':
        document.getElementById('money').dataset.money = new_orden;
        document.getElementById('titulo').dataset.titulo = "ASC";
        document.getElementById('rating').dataset.rating = "ASC";
        break;
      default:
        break;
    }

    if (campo == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("txtHint").innerHTML = this.responseText;
    }
    xhttp.open("GET", "get_orden.php?campo="+campo+"&orden="+orden);
    xhttp.send();
  }

  function filtrar(){
    var filtro = document.getElementById("filtro").value;

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("txtHint").innerHTML = this.responseText;
    }
    xhttp.open("GET", "get_filtro.php?q="+filtro);
    xhttp.send();
  }
</script>
</body>
</html>