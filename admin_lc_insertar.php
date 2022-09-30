<?php require_once('header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php

            include('conexion.php');
            
            $formato=$_POST["formato"];
            $precio=$_POST["precio"];
            $id_plato=$_POST["id_plato"];

            $sql = "INSERT INTO lineas_carta (id_formato, precio, id_plato) VALUES (?, ?, ?)"; // SQL with parameters
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("sdi", $formato, $precio, $id_plato);

            $se=$stmt->execute();
            ?>
            <p>
            <?php
            if (false===$se) {
            die("execute() failed: ". htmlspecialchars($stmt->error));
            }else{
            echo "New record created  successfully.";
            }
            
            $stmt->close();
            ?>
            </p>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
    
</body>
</html>