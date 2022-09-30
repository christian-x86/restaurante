<?php require_once('header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            include("conexion.php");
            $sql = "SELECT * FROM lineas_carta WHERE id_plato=".$_GET["id_plato"].";";
            $result = $conn->query($sql);

            $arrActivos=[];
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($arrActivos,$row["id_formato"]);
                }
                // sin while
                // $row = $result -> fetch_all(MYSQLI_ASSOC);
            } else {
            echo "0 results";
            }

            $sql = "SELECT id_formato, nombre FROM formato;";
            $result = $conn->query($sql);

            $resultado=[];

            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    $resultado[$row["id_formato"]]= $row["nombre"];
                }
            } else {
            echo "0 results";
            }

            $conn->close();

            ?>
            <form action="admin_lc_insertar.php" method="post" id="form1">
                <h2>Nuevo formato</h2>
                <div class='form-group row'>
                    <div class='col'>
                        <select name="formato" id="formato" class="formato form-select">
                            <?php
                            foreach ($resultado as $key => $value) {
                                ?>
                                <option value='<?php echo $key; ?>' <?php if(in_array($key, $arrActivos)){echo "disabled";} ?>><?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class='col'>
                        <input type="number" name="precio" step="0.01" placeholder="precio" id="precio" class="form-control">
                    </div>
                </div>
                <input type='hidden' name='id_plato' value='<?php echo $_GET["id_plato"];?>'>
                <input type="submit" value="Enviar"  id="env" class="form-control btn btn-primary">
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
    <script type="text/javascript">

    </script>
</body>
</html>