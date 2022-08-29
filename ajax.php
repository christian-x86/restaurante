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
        <select name="customers" onchange="showCustomer(this.value)">
        <option value="">Selecciona carta</option>

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

    <br>
    <div id="txtHint">Customer info will be listed here...</div>

    <script>
    function showCustomer(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        document.getElementById("txtHint").innerHTML = this.responseText;
    }
    xhttp.open("GET", "getcustomer.php?q="+str);
    xhttp.send();
    }
    </script>
</body>
</html>