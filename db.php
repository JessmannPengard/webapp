<?php
include("config.php");

$conn = mysqli_connect($servername, $db_username, $db_password, $database);

if (mysqli_connect_errno()) {
    echo "Error de conexión con la base de datos: " . mysqli_connect_error();
}

?>