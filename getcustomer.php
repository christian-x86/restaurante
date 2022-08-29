<?php
include("conexion.php");

$sql = "SELECT carta.nombre AS carta_nombre, seccion.nombre AS seccion_nombre, plato.id_plato AS id_plato, plato.nombre AS plato_nombre, formato.nombre AS formato_nombre, lineas_carta.precio
FROM carta
JOIN seccion ON carta.id_carta = seccion.id_carta
JOIN plato_seccion ON seccion.id_seccion = plato_seccion.id_seccion
JOIN plato ON plato_seccion.id_plato=plato.id_plato
JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato
JOIN formato ON lineas_carta.id_formato=formato.id_formato
WHERE carta.id_carta = ?
ORDER BY carta.id_carta, seccion.id_seccion, plato.nombre, formato.id_formato;";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['q']);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$stmt->close();

$user = $result->fetch_assoc(); // fetch data 

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