<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>

    <?php
    require("usuarios.php");
    if (isset($_POST["username"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $date_time = date("Y-m-d H:i:s");
        if (!existeUsuario($username)) {
            if (!existeEmail($email)) {
                if (registrarUsuario($username, $email, md5($password), $date_time)) {
                    //Registro exitoso
                    echo "Registro exitoso";
                } else {
                    //Error de registro
                    echo "Error de registro";
                }
            } else {
                //Error de registro
                echo "Ya existe un usuario con este email";
            }
        } else {
            //Error de registro
            echo "Ya existe un usuario con este nombre";
        }
    }

    ?>

    <form class="form" action="" method="post">
        <h1 class="login-title">Registro</h1>
        <input type="text" class="login-input" name="username" placeholder="Nombre de usuario" required />
        <input type="text" class="login-input" name="email" placeholder="Email">
        <input type="password" class="login-input" name="password" placeholder="Contraseña">
        <input type="submit" name="submit" value="Registrarse" class="login-button">
        <p class="link"><a href="login.php">Click para iniciar sesión</a></p>
    </form>

</body>

</html>