<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="admin_lc_insertar.php" method="post" id="form1">
        <input type="submit" value="Enviar"  id="env">
    </form>
    <button onClick="anadir_input()">
        +
    </button>


    <?php
    include("conexion.php");
    $sql = "SELECT id_formato, nombre FROM formato";
    $result = $conn->query($sql);

    $resultado=[];
    

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        // echo "<option value='".$row["id_formato"]."'>".$row["nombre"]."</option>";
        $resultado[$row["id_formato"]]= $row["nombre"];
      }
    } else {
      echo "0 results";
    }
    
    $conn->close();

    // var_dump($resultado);
    ?>


    <script type="text/javascript">
        
        const passedArray = 
        <?php echo json_encode($resultado); ?>;
        console.log(passedArray);
        console.log(Object.keys(passedArray).length);

        var down = document.getElementById("form1");
        function anadir_input() {
            
            // var formato = document.createElement("input");
            // formato.setAttribute("type", "text");
            // formato.setAttribute("name", "formato");
            // formato.setAttribute("placeholder", "formato");
            
            var formato_select = document.createElement("select");
            formato_select.setAttribute("name", "formato");

            
            for (let index = 1; index <= Object.keys(passedArray).length; index++) {
                const element = passedArray[index];
                
                console.log(element);

                var formato_option = document.createElement("option");
                formato_option.setAttribute("value", element);
                formato_option.innerHTML=element;
                
                formato_select.appendChild(formato_option)
            }


            var precio = document.createElement("input");
            precio.setAttribute("type", "number");
            precio.setAttribute("name", "precio");
            precio.setAttribute("placeholder", "precio");

            // document.getElementById("form1").appendChild(formato);
            document.getElementById("form1").appendChild(formato_select);
            
            document.getElementById("form1").appendChild(precio);

            // desplaza el submit al final
            document.querySelector("#form1").appendChild(document.getElementById("env"));
        }
    </script>
</body>
</html>