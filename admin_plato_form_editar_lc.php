<?php require_once('header.php'); ?>
      <h2>Detalles del plato</h2>
      <form action="admin_plato_editar_lc.php" method="post" class="form-group">
        <?php
        include("conexion.php");

        $sql = "SELECT plato.id_plato, plato.nombre, plato.descripcion, plato.id_seccion, formato.id_formato, formato.nombre AS 'Formato', precio, id_lineas_carta
        FROM plato JOIN lineas_carta ON plato.id_plato=lineas_carta.id_plato JOIN formato ON lineas_carta.id_formato=formato.id_formato
        WHERE plato.id_plato=".$_POST["id_plato"].";";

        $result = $conn->query($sql);

        $arrFormato=[];

        $arrInicial=[];

        // bool para ver si se ya esta impreso el plato
        $impreso=false;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if (!$impreso) {
                echo "
                <input type='hidden' value='".$row["id_plato"]."' name='id_plato' id='id_plato'>
                <label for='nombre'>Nombre </label>
                <input type='text' value='".$row["nombre"]."' name='nombre'  id='nombre' class='form-control'>
                <label for='descripcion'>Descripción </label>
                <textarea name='descripcion' id='descripcion' class='form-control'>".$row["descripcion"]."</textarea>";
                $impreso=true;
              }
              // asignamos la seccion a una variable para usarla en el select
              $seccion1=$row["id_seccion"];
              // lista de formatos para ese plato
              $arrFormato[] = ["id_formato"=>$row["id_formato"], "precio"=>$row["precio"], "id_lineas_carta"=>$row["id_lineas_carta"]];
              array_push($arrInicial, $row["id_formato"]);
            }
          } else {
            echo "0 results";
          }
          $conn->close();

        ?>
        <label for="id_seccion">Sección </label>
        <select name="id_seccion" id="id_seccion" class='form-select'>
        <?php
        include("conexion.php");
        $sql = "SELECT id_seccion, nombre FROM seccion";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            if ($seccion1==$row["id_seccion"]) {
              echo "<option value='".$row["id_seccion"]."' selected>".$row["nombre"]."</option>";
            }else{
              echo "<option value='".$row["id_seccion"]."'>".$row["nombre"]."</option>";
            }
          }
        } else {
          echo "0 results";
        }

        ?>
        </select>
        <?php

        $sql = "SELECT * FROM formato;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            // lista de todos los formatos
            $arrFormatos[] = ["id_formato"=>$row["id_formato"], "nombre"=>$row["nombre"]];
        } 
        }else {
          echo "0 results";
        }

        $conn->close();

        foreach ($arrFormato as $key => $value1) {
          echo "
          <div class='form-group row'>
            <div class='col'>
              <select name='formato[".$key."]' id='formato' class='form-control form-select'>";
          
          foreach ($arrFormatos as $key2 => $value2) {
            ?>
                <option value='<?php echo $value2["id_formato"]; ?>' <?php if($value1["id_formato"]==$value2["id_formato"]){echo "selected";} if(($value2["id_formato"]!=$value1["id_formato"]) && in_array($value2["id_formato"], $arrInicial)){echo "disabled";}?>><?php echo $value2["nombre"]; ?></option>
            <?php
          }
          echo "
              </select>
            </div>
            <div class='col'>
              <input type='number' step='0.01' name='precio[".$key."]' id='precio' value='".$value1["precio"]."' class='form-control'>
            </div>
            <input type='hidden' name='id_lineas_carta[".$key."]' value='".$value1["id_lineas_carta"]."'>
          </div>";

        }

        ?>
        <div class="form-group row">
          <div class='col-7'>
            <a href='admin_lc_form_insertar.php?id_plato=<?php echo $_POST["id_plato"]; ?>' <?php if (count($arrFormatos)==count($arrFormato)) {echo "style='pointer-events: none';";} ?> class='btn btn-primary form-control' id="js_a_btn">Nuevo formato</a>
          </div>
          <div class='col-5'>
            <input type="submit" class="btn btn-primary form-control" value="Enviar">
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
  <script>
    $(document).ready(function() {

      // array de php a js
      // todos los formatos
      const formatos = 
      <?php echo json_encode($arrFormatos); ?>;
      // console.log(formatos);
      // console.log(Object.keys(formatos).length);

      // los formatos asignados
      const formato = 
      <?php echo json_encode($arrFormato); ?>;

      // Si todos los formatos están asignados el boton de añadir pasa a gris
      if (Object.keys(formatos).length==Object.keys(formato).length) {
        $("#js_a_btn").removeClass("btn-primary");
        $("#js_a_btn").addClass("btn-secondary");
      }

      // array que guarda los cambios
      const arrCambios = formato;

      // Array que guarda los disabled anteriores
      const anterior = [];

      // disable en los option que no sean los que seleccionamos
      for (const iterator in formato) {

        $('select[name="formato['+iterator+']"]').change(function() {
          anterior[iterator] = arrCambios[iterator]["id_formato"];

          arrCambios[iterator]["id_formato"]=$('select[name="formato['+iterator+']"]').val();
          
          for (const iterator2 in arrCambios) {
            if (iterator!=iterator2) {
              
              $('select[name="formato['+iterator2+']"]').children('option[value="'+arrCambios[iterator]["id_formato"]+'"]').attr("disabled",true);
              $('select[name="formato['+iterator2+']"]').children('option[value="'+anterior[iterator]+'"]').attr("disabled",false);

            }
          }
        });
      }
    });
  </script>
</body>
</html>