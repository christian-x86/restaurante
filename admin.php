<?php

$link = mysqli_connect("localhost", "root", "", "restaurante");

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>