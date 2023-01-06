<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <?php
    require("users.php");

    session_start();

    if (isset($_POST["username"])) {
        $username = $_POST["user_name"];
        $password = $_POST["user_password"];
        if (authUser($username, md5($password))) {
            //Usuario autorizado
            $_SESSION['user_name'] = $username;
            header("Location: index.php");
        } else {
            //Combinación usuario-contraseña incorrecta
            echo "Combinación usuario-contraseña incorrecta";
        }
    }
    ?>

    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="user_name" placeholder="Usuario" autofocus="true" />
        <input type="password" class="login-input" name="user_password" placeholder="Contraseña" />
        <input type="submit" value="Login" name="submit" class="login-button" />
        <p class="link"><a href="register.php">Registrarse</a></p>
    </form>
</body>

</html>