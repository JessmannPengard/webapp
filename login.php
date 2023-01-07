<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reg_log.css">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<body class="login-body">

    <?php
    require("users.php");

    session_start();

    if (isset($_POST["user_name"])) {
        $username = $_POST["user_name"];
        $password = $_POST["user_password"];
        $user_id = authUser($username, $password);
        if ($user_id > 0) {
            //Usuario autorizado
            $_SESSION['user_name'] = $username;
            $_SESSION['user_id'] = $user_id;
            header("Location: index.php");
        } else {
            //Combinación usuario-contraseña incorrecta
            $msg = "Nombre de usuario y/o contraseña no válidos";
        }
    }
    ?>

    <form class="form" method="post" name="login">
        <h2 class="login-title">Login</h2>
        <input type="text" class="login-input" name="user_name" placeholder="Nombre de usuario" autofocus="true"
            required />
        <input type="password" class="login-input" name="user_password" placeholder="Contraseña" required />
        <input type="submit" value="Iniciar sesión" name="submit" class="login-button" />
        <p class="login-link"><a href="register.php" class="login-text-link">Registrarse</a></p>
    </form>
    <?php echo "<p class='msg'>" . (isset($msg) ? $msg : "") . "</p>" ?>

    <?php include(__DIR__ . "/view/footer.php") ?>
</body>

</html>