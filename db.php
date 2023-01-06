<?php
include("config.php");

$conn = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Error de conexión con la base de datos: ".mysqli_connect_error();
}

?>