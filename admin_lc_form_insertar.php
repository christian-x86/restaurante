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
    $sql = "SELECT id_formato, nombre FROM formato";
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

    // var_dump($resultado);
    ?>
    <form action="admin_lc_insertar.php" method="post" id="form1">
        <select name="formato[]" id="formato">
            <?php
            foreach ($resultado as $key => $value) {
                echo "<option value='".$key."'>".$value."</option>";
            }
            ?>
        </select>
        <input type="number" name="precio[]" step="0.01" placeholder="precio" id="precio">
        <input type="submit" value="Enviar"  id="env">
    </form>
    <button onClick="anadir_input()">+</button>
    <button onClick="quitar_input()">-</button>

    <script type="text/javascript">
        
        const passedArray = 
        <?php echo json_encode($resultado); ?>;
        console.log(passedArray);
        // console.log(Object.keys(passedArray).length);

        function anadir_input() {
            
            var formato_select = document.createElement("select");
            formato_select.setAttribute("name", "formato[]");
            formato_select.setAttribute("id", "formato");
            
            for (let index = 1; index <= Object.keys(passedArray).length; index++) {
                const element = passedArray[index];

                var formato_option = document.createElement("option");
                formato_option.setAttribute("value", index);
                formato_option.innerHTML=element;
                
                formato_select.appendChild(formato_option);
            }

            var precio = document.createElement("input");
            precio.setAttribute("type", "number");
            precio.setAttribute("name", "precio[]");
            precio.setAttribute("step", "0.01");
            precio.setAttribute("placeholder", "precio");
            precio.setAttribute("id", "precio");

            // evitar que se creen mas entradas que opciones hay
            var ele = document.getElementById('form1');
            var lastEle = ele[ ele.length-2 ];
            console.log((ele.length-1)/2);
            console.log(Object.keys(passedArray).length);
            if (!((ele.length-1)/2>Object.keys(passedArray).length-1)) {
                
                document.getElementById("form1").appendChild(formato_select);
                
                document.getElementById("form1").appendChild(precio);
    
                // desplaza el submit al final
                document.querySelector("#form1").appendChild(document.getElementById("env"));
            }
        }

        function quitar_input(){
            // Elimina los 2 ultimos campos
            var ele = document.getElementById('form1');
            var lastEle = ele[ ele.length-2 ];
            var lastEle2 = ele[ ele.length-3 ];
            // evita que se eliminen los dos ultimos campos
            if (ele.length>3) {
                lastEle.parentNode.removeChild(lastEle);
                lastEle2.parentNode.removeChild(lastEle2);
            }
        }

    </script>
</body>
</html>