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
  
    $sql = "SELECT id_carta, nombre FROM carta";
    $result = $conn->query($sql);
    ?>

    <h2>The XMLHttpRequest Object</h2>

    <!-- <form action=""> 
    <select name="customers" onchange="showCustomer(this.value)">
        <option value="">Select a customer:</option>
        <option value="1">Carta 1</option>
        <option value="2 ">Carta 2</option>
        <option value="3">Carta 3</option>
    </select>
    </form> -->


    <form action="">
        <select name="carta" onchange="showCarta(this.value)">
            <option value="0" selected>Todas las cartas</option>

            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["id_carta"]."'>".$row["nombre"]."</option>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>

        </select>
    </form>

    <?php
    include("conexion.php");
  
    $sql = "SELECT carta.nombre AS carta_nombre, seccion.nombre AS seccion_nombre, plato.id_plato AS id_plato, plato.nombre AS plato_nombre, formato.nombre AS formato_nombre, lineas_carta.precio
    FROM carta
    JOIN seccion ON carta.id_carta = seccion.id_carta
    JOIN plato_seccion ON seccion.id_seccion = plato_seccion.id_seccion
    JOIN plato ON plato_seccion.id_plato=plato.id_plato
    JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato
    JOIN formato ON lineas_carta.id_formato=formato.id_formato
    ORDER BY carta.id_carta, seccion.id_seccion, plato.nombre, formato.id_formato;";

    $result = $conn->query($sql);
    ?>

    <br>
    <div id="txtHint">
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            // var_dump($row);
                foreach ($row as $key => $value) {
                echo $key.": <b>".$value."</b> | ";
                }
                echo "<br>";
            }
        } else {
            echo "0 results";
        }

    ?>
    </div>

    <script>
    
    function showCarta(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("txtHint").innerHTML = this.responseText;
    }
    xhttp.open("GET", "getcarta.php?q="+str);
    xhttp.send();
    }
    </script>
</body>
</html>