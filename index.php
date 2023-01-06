<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenido</title>
</head>

<body>
    <h1>Página de contenido</h1>
    <h3>Bienvenido <?php echo $_SESSION["user_name"]; ?> </h3>
    <p><a href="logout.php">Desconectar</a></p>
</body>

</html>