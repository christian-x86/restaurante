<?php require_once('header.php'); ?>
<h2>Insertar plato</h2>
<form action="admin_inserta_plato.php" method="post" class="form-group">
  <label for="nombre">Nombre </label>
  <input type="text" name="nombre" id="nomber" class='form-control'>
  <label for="descripcion">Descripción </label>
  <textarea name='descripcion' id='descripcion' class='form-control'></textarea>
  <label for="nombre">Sección </label>

  <select name="seccion" class="form-select">
    <option value="0" id="select">Selecciona sección</option>
    
    <?php
    include("conexion.php");
    $sql1 = "SELECT id_seccion, nombre FROM seccion";
    $result = $conn->query($sql1);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<option value='".$row["id_seccion"]."' >".$row["nombre"]."</option>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>

  </select>

  <input type="submit" class="btn btn-primary form-control" value="Enviar">
</form>

<?php require_once('footer.php'); ?>