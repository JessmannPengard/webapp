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
    require("users.php");
    if (isset($_POST["user_name"])) {
        $username = $_POST["user_name"];
        $email = $_POST["user_email"];
        $password = $_POST["user_password"];
        $date_time = date("Y-m-d H:i:s");
        if (!existsUser($username)) {
            if (!existsEmail($email)) {
                if (validPassword($password)) {
                    if (userRegister($username, $email, md5($password), $date_time)) {
                        //Registro exitoso
                        echo "Registro exitoso";
                    } else {
                        //Error de registro
                        echo "Error de registro";
                    }
                } else {
                    //Error de registro
                    echo "Contraseña demasiado débil";
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
        <input type="text" class="login-input" name="user_name" placeholder="Nombre de usuario" required />
        <input type="text" class="login-input" name="user_email" placeholder="Email">
        <input type="password" class="login-input" name="user_password" placeholder="Contraseña">
        <input type="submit" name="submit" value="Registrarse" class="login-button">
        <p class="link"><a href="login.php">Click para iniciar sesión</a></p>
    </form>

</body>

</html>